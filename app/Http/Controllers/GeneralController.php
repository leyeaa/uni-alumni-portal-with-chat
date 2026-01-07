<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlumniProfile;
use PHPMailer\PHPMailer\SMTP;

use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isNull;

class GeneralController extends Controller
{
    //Home Page Controller
    public function index(){
        $featuredMembers=DB::table('alumni_profiles')->where('matricno','<>','SUP-ICT-1')->orderBy('id', 'desc')->take(4)->get();
        return view('webpages.index',[
            'featuredMembers'=>$featuredMembers
        ]);
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
    
}
