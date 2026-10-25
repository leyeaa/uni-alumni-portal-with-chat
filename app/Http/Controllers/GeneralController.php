<?php

namespace App\Http\Controllers;

use App\Models\AlumniProfile;
use App\Models\Donation;
use function PHPUnit\Framework\isNull;
use App\Models\News;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class GeneralController extends Controller
{


public function request_application_info(){
    return view('alumni.application-info');
}



    //Home Page Controller
    public function index(){
        $featuredMembers = AlumniProfile::latest()
        ->take(4)
        ->get();

    $news = News::latest()
        ->take(3)
        ->get();

    $events = Event::orderBy('event_date', 'asc')
        ->take(5)
        ->get();

    return view('webpages.index', compact(
        'featuredMembers',
        'news',
        'events'
    ));

    }

    public function newsRead($slug)
{
    $news = News::where('slug', $slug)->firstOrFail();

    $latestNews = News::latest()
        ->where('id', '!=', $news->id)
        ->take(5)
        ->get();

    return view('webpages.news-read', compact(
        'news',
        'latestNews'
    ));
}

    public function about(){
        return view('webpages.about-us');
    }

    public function contactUs(){
        return view('webpages.contact-us');
    }

    public function sendFeedback(Request $request){
        $secretKey = '6Ldek1gpAAAAAAqcKC5xXkC161ZED5wN2LFezuu0';
        $captcha = $request['g-recaptcha-response'];

        if(!$captcha){
            $status='Please check the captcha form';
            $a=0;
        }else{

            $ip = $_SERVER['REMOTE_ADDR'];
            $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
            $responseKeys = json_decode($response,true);
            if(intval($responseKeys["success"]) !== 1) {
                $status='Please check the captcha form.';
                $a=0;
            }else{
                $formFields = $request->validate([
                    'name'=> 'required',
                    'email' => ['required', 'email'],
                    'subject' => 'required',
                    'mobile' => 'required',
                    'message' => 'required'
                ]);

                //send feedback/enquiry to email
                // $data = $formFields;

                // $data = ['messageDetails' => $formFields];
                // dd($formFields->name);
                $message = view('email.contact-feedback', ['enquiry' => $formFields])->render();

                // dd($message);
                require 'PHPMailer/vendor/autoload.php';
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host       = env('EMAIL_HOST');
                $mail->SMTPAuth   = true;
                $mail->Username   = env('EMAIL_USERNAME');
                $mail->Password   = env('EMAIL_PASSWORD');
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
                $mail->setFrom($formFields['email'], $formFields['name']);
                $mail->addAddress('alumni@unimed.edu.ng');
                $mail->isHTML(true);
                $mail->Subject =  $formFields['subject'];
                $mail->Body    = $message;
                $dt = $mail->send();
                if($dt){
                    $status = 'Enquiry Successfully Sent, We will contact you shortly';
                } else{
                    $status = 'Something went wrong, Message not submitted';
                }
            }
        }

        return redirect('/contact-us')->with('message', $status);
    }

    public function donation(){
        $transactionID="FUF".sprintf("%010d",mt_rand());
        return view('alumni.donation', [
            'transactionID'=>$transactionID
        ]);
    }

    public function donorVerification(Request $request){
        $secretKey = '6Ldek1gpAAAAAAqcKC5xXkC161ZED5wN2LFezuu0';
        $captcha = $request['g-recaptcha-response'];

        $validator=Validator::make($request->all(),[
            'transaction_id'=>'required',
            'matricno'=>'string|min:10|max:15|nullable',
            'surname'=>'required',
            'other_names'=>'required',
            'address'=>'required',
            'phone'=>'required|digits:11',
            'email'=>'required',
            'amount'=>'required|numeric|min:1000',
            'payment_type'=>'required',
            'g-recaptcha-response'=>'required'
        ])->validate();
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
            return back()->with('message', 'Please check the captcha form.');
        }else{
            $donationRecord=$request->except(['_token','_method','g-recaptcha-response']);
            if(empty($donationRecord['matricno'])){
                $donationRecord['matricno']="DONOR-".substr(mt_rand(),0,5);
            }
            return view('alumni.donor-verification', [
                'formFields'=>$donationRecord
            ]);
        }
    }

    public function executive(){
        return view('webpages.executives');
    }


public function donationPaystack(Request $request)
{
    // 1. Save to DB FIRST (PENDING)
    Donation::updateOrCreate(
        ['transaction_id' => $request->transaction_id],
        [
            'matricno' => $request->matricno,
            'surname' => $request->surname,
            'other_names' => $request->other_names,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'amount' => $request->amount,
            'payment_type' => $request->payment_type,
            'status' => 'PENDING',
            'payment' => 'UNPAID',
        ]
    );

    // 2. Initialize Paystack
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('API_SECRET_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://api.paystack.co/transaction/initialize', [
        'email' => $request->email,
        'amount' => (int)$request->amount * 100,
        'reference' => $request->transaction_id,
        'callback_url' => route('donation.callback'),
        'metadata' => [
            'matricno' => $request->matricno,
            'surname' => $request->surname,
            'other_names' => $request->other_names,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_type' => $request->payment_type,
        ],
    ]);

    $data = $response->json();

    if (!($data['status'] ?? false)) {
        return back()->with('error', 'Payment initialization failed');
    }

    return redirect($data['data']['authorization_url']);
}


public function donationCallback(Request $request)
{
    $reference = $request->reference;

    if (!$reference) {
        return redirect()->route('donation')->with('error', 'Missing reference');
    }

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('API_SECRET_KEY'),
    ])->get("https://api.paystack.co/transaction/verify/{$reference}");

    $data = $response->json();

    if (($data['data']['status'] ?? null) === 'success') {

        Donation::where('transaction_id', $reference)->update([
            'status' => 'APPROVED',
            'payment' => 'PAID',
            'pay_channel' => 'PAYSTACK',
            'amount' => $data['data']['amount'] / 100,
            'customer_email' => $data['data']['customer']['email'] ?? null,
            'paid_at' => now(),
            'tranref' => json_encode($data),
        ]);

        return redirect()->route('home')->with('message', 'Payment Successful.');
    }

    return redirect()->route('home')->with('message', 'Payment Failed.');
}


public function eventRead($id)
{
    $event = Event::findOrFail($id);

    return view('webpages.event-read', compact('event'));
}

public function newsIndex()
{
    $news = News::latest()->paginate(9);

    return view('webpages.news-index', compact('news'));
}


public function eventsIndex()
{
    $events = Event::latest()->paginate(9);

    return view('webpages.events-index', compact('events'));
}

}
