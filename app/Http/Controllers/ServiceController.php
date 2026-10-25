<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumniregRequestFormRequest;
use App\Http\Requests\DueRequestFormRequest;
use App\Http\Requests\ServiceRequestFormRequest;
use App\Models\Alumnireg;

use App\Models\DueRequest;
use App\Models\ServiceRequest;
use function PHPUnit\Framework\isNull;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ServiceController extends Controller
{
    //


    public function dues(){
        return view('alumni.dues');
    }

     public function alumnireg(){
        return view('alumni.alumnireg');
    }


    public function services(){
        return view('alumni.services');
    }

    public function processDueRequest(DueRequestFormRequest $request){
        // dd($request);
        $request->validated();
        $formFields = $request->except(['_token','_method']);
        if(DueRequest::where("request_method",$formFields['request_method'])->where("matricno",auth()->user()->matricno)->where("service_type","Annual Due")->where("status","APPROVED")->exists()){
            return redirect(route('DuerequestHistory'))->with('message','Dues Already Paid for the Specified Year');
        }

        $formFields['matricno']=auth()->user()->matricno;
        $formFields['amount']=5000.00;
        DueRequest::create($formFields);

        return redirect(route('DuerequestHistory'))->with('message','Request Successfully Submitted');
    }


        public function processAlumniregRequest(AlumniregRequestFormRequest $request){
        // dd($request);
        $request->validated();
        $formFields = $request->except(['_token','_method']);
        if(Alumnireg::where("request_method",$formFields['request_method'])->where("matricno",auth()->user()->matricno)->where("service_type","Annual Due")->where("status","APPROVED")->exists()){
            return redirect(route('AlumniregrequestsHistory'))->with('message','Alumni Registration Fee Already Paid');
        }

        $formFields['matricno']=auth()->user()->matricno;
        if($formFields['request_method'] == "UNDERGRADUATE"){
            $formFields['amount']=10000.00;
        }else{
             $formFields['amount']=15000.00;
        }

        Alumnireg::create($formFields);

        return redirect(route('AlumniregrequestsHistory'))->with('message','Request Successfully Submitted');
    }




public function processServiceRequest(ServiceRequestFormRequest $request)
{
    $request->validated();

    $formFields = $request->except(['_token', '_method']);

    $formFields['matricno'] = auth()->user()->matricno;
    $formFields['graduate_category'] = auth()->user()->alumniProfile->graduate_category;

    // create request first
    $serviceRequest = ServiceRequest::create($formFields);

    // upload document
    if ($request->hasFile('request_document')) {

        $file = $request->file('request_document');
         $matric = str_replace(['/', '\\', ' '], '_', auth()->user()->matricno);

        // unique identifiable filename
        $filename =
            'REQ_' .
            $serviceRequest->id . '_' .
            $matric . '_' .
            now()->format('YmdHis') . '_' .
            uniqid() . '.' .
            $file->getClientOriginalExtension();

        // move file
        $file->move(
            public_path('request_document'),
            $filename
        );

        // save filename
        $serviceRequest->request_document = $filename;
        $serviceRequest->save();
    }


        if ($request->hasFile('request_add_document')) {

        $file = $request->file('request_add_document');
        $matric = str_replace(['/', '\\', ' '], '_', auth()->user()->matricno);

        // unique identifiable filename
        $filename =
            'REQ_' .
            $serviceRequest->id . '_' .
            $matric . '_' .
            now()->format('YmdHis') . '_' .
            uniqid() . '.' .
            $file->getClientOriginalExtension();

        // move file
        $file->move(
            public_path('request_add_document'),
            $filename
        );

        // save filename
        $serviceRequest->request_add_document = $filename;
        $serviceRequest->save();
    }

    return redirect(route('requestHistory'))
        ->with('message', 'Request Successfully Submitted');
}

    public function editServiceRequest($id){
        $serviceRequest=ServiceRequest::firstWhere('id',$id);
        return view('alumni.edit-services',[
            'serviceRequest'=>$serviceRequest
        ]);
    }

        public function editDueRequest($id){
        $dueRequest=DueRequest::firstWhere('id',$id);
        return view('alumni.edit-dues',[
            'dueRequest'=>$dueRequest
        ]);
    }

public function updateServiceRequest(ServiceRequestFormRequest $request, $id)
{
    $request->validated();

    $updateRecord = $request->except(['_token', '_method']);

    $previousRecord = ServiceRequest::firstWhere('id', $id);

    $previousAmount = $this->serviceFee(
        $previousRecord->service_type,
        $previousRecord->request_method
    );

    $newAmount = $this->serviceFee(
        $request->service_type,
        $request->request_method
    );

    // regenerate transaction ID if amount changes
    if ($previousAmount != $newAmount) {

        $updateRecord['transaction_id'] =
            "ARS" . sprintf("%010d", mt_rand());
    }

    // upload new document
    if ($request->hasFile('request_document')) {

        $file = $request->file('request_document');
        $matric = str_replace(['/', '\\', ' '], '_', auth()->user()->matricno);

        // filename using request ID
        // $filename = $id . '.' . $file->getClientOriginalExtension();
        $filename =
    'REQ_' .
    $id . '_' .
    $matric . '_' .
    now()->format('YmdHis') . '_' .
    uniqid() . '.' .
    $file->getClientOriginalExtension();

        // move file
        $file->move(public_path('request_document'), $filename);

        // save filename
        $updateRecord['request_document'] = $filename;
    }

        if ($request->hasFile('request_add_document')) {

        $file = $request->file('request_add_document');
        $matric = str_replace(['/', '\\', ' '], '_', auth()->user()->matricno);

        // filename using request ID
        // $filename = $id . '.' . $file->getClientOriginalExtension();
        $filename =
    'REQ_' .
    $id . '_' .
    $matric . '_' .
    now()->format('YmdHis') . '_' .
    uniqid() . '.' .
    $file->getClientOriginalExtension();

        // move file
        $file->move(public_path('request_add_document'), $filename);

        // save filename
        $updateRecord['request_add_document'] = $filename;
    }

    // update record
    $previousRecord->update($updateRecord);

    return redirect(route('requestHistory'))
        ->with('message', 'Request Successfully Updated');
}

        public function updateDueRequest(DueRequestFormRequest $request, $id){
        $request->validated();
        $updateRecord=$request->except(['_token','_method']);
        $previousRecord=DueRequest::Where('id',$id);
        $previousRecord->update($updateRecord);
        return redirect(route('DuerequestHistory'))->with('message','Request Successfully Updated');
    }
    public function requestsHistory(){
        //return all request History
        // $allRequest=ServiceRequest::where('id',1)->();
        return view('alumni.request-history');
    }

        public function DuerequestsHistory(){
        //return all request History
        // $allRequest=ServiceRequest::where('id',1)->();
        return view('alumni.Due-request-history');
    }

     public function AlumniregrequestsHistory(){
        //return all request History
        // $allRequest=ServiceRequest::where('id',1)->();
        return view('alumni.alumnireg-history');
    }

    //check price for service request
    private function serviceFee($serviceType,$requestMethod){
        if($serviceType=="Transcript"){
            switch ($requestMethod) {
                case 'Student Copy via Email':
                    $amount=17000;
                    break;
                case 'Student Copy via Courier':
                    $amount=17000;
                    break;
                case 'Official Copy via Email':
                    $amount=17000;
                    break;
                case 'Official Copy via Courier':
                    $amount=17000;
                    break;
                default:
                    $amount=17000;
                    break;
            }
        }else{
            $amount=5000;
        }
        return $amount;
    }





public function servicePayment($id)
{
    // initiate payment
    $serviceDetails = ServiceRequest::firstWhere('id', $id);

    // generate transaction ID if null
    if (is_null($serviceDetails->transaction_id)) {
        $transaction_id = "ARS" . sprintf("%010d", mt_rand());
        DB::table('service_requests')
            ->where('id', $id)
            ->update([
                'transaction_id' => $transaction_id,
                'updated_at' => now(),
            ]);
        // refresh data
        $serviceDetails = ServiceRequest::firstWhere('id', $id);
    }
    $amount = $this->serviceFee(
        $serviceDetails->service_type,
        $serviceDetails->request_method
    );
    $serviceDetails['amount'] = $amount;
    return view('alumni.service-payment', [
        'profile' => Auth::user()->alumniProfile,
        'serviceDetails' => $serviceDetails
    ]);
}

public function duePayment($id)
{
    $dueDetails = DueRequest::firstWhere('id', $id);

    if (is_null($dueDetails->transaction_id)) {

        $transaction_id = "ADP" . sprintf("%010d", mt_rand());

        DB::table('due_requests')
            ->where('id', $id)
            ->update([
                'transaction_id' => $transaction_id,
                'updated_at' => now(),
            ]);

        $dueDetails = DueRequest::firstWhere('id', $id);
    }

    return view('alumni.due-payment', [
        'profile' => Auth::user()->alumniProfile,
        'dueDetails' => $dueDetails
    ]);
}


public function alumniregPayment($id)
{
    $dueDetails = Alumnireg::firstWhere('id', $id);

    if (is_null($dueDetails->transaction_id)) {

        $transaction_id = "ARF" . sprintf("%010d", mt_rand());

        DB::table('alumniregs')
            ->where('id', $id)
            ->update([
                'transaction_id' => $transaction_id,
                'updated_at' => now(),
            ]);

        $dueDetails = Alumnireg::firstWhere('id', $id);
    }

    return view('alumni.alumnireg-payment', [
        'profile' => Auth::user()->alumniProfile,
        'dueDetails' => $dueDetails
    ]);
}

public function alumniDuesPaystack(Request $request)
{
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('API_SECRET_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://api.paystack.co/transaction/initialize', [

        'email' => $request->email,

        // Kobo
        'amount' => $request->amount * 100,

        'payment_type' => "UNIMED ALUMNI ANNUAL DUES",

         'callback_url' => route('duepaymentCallback'),

        // unique reference
        'reference' => $request->transaction_id,

        'metadata' => [

        'matricno' => $request->matricno,

        'request_method' => $request->request_method,

        'service_type' => "Annual Due",
    ],

    ]);

    if ($response->successful()) {

        $data = $response->json();

        return redirect($data['data']['authorization_url']);
    }

    return back()->with('error', 'Unable to initialize payment');
}


public function alumniRegPaystack(Request $request)
{
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('API_SECRET_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://api.paystack.co/transaction/initialize', [

        'email' => $request->email,

        // Kobo
        'amount' => $request->amount * 100,

        'payment_type' => "UNIMED ALUMNI REGISTRATION FEE",

         'callback_url' => route('alumniregpaymentCallback'),

        // unique reference
        'reference' => $request->transaction_id,

        'metadata' => [

        'matricno' => $request->matricno,

        'request_method' => $request->request_method,

        'service_type' => "Alumni Registration Fee",
    ],

    ]);

    if ($response->successful()) {

        $data = $response->json();

        return redirect($data['data']['authorization_url']);
    }

    return back()->with('error', 'Unable to initialize payment');
}





public function duepaymentCallback(Request $request)
{
    $reference = $request->reference;

    if (!$reference) {
        return redirect()->back()->with('error', 'No payment reference supplied');
    }

    // Verify transaction from Paystack
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('API_SECRET_KEY'),
    ])->get("https://api.paystack.co/transaction/verify/{$reference}");

    if ($response->successful()) {

        $paymentData = $response->json();

        // Check payment status
        if ($paymentData['data']['status'] == 'success') {

            // Save transaction
  DueRequest::where('transaction_id', $paymentData['data']['reference'])
    ->update([

        'matricno' => $paymentData['data']['metadata']['matricno'] ?? null,

        'service_type' => $paymentData['data']['metadata']['service_type'] ?? null,

        'request_method' => $paymentData['data']['metadata']['request_method'] ?? null,

        'pay_channel' => 'PAYSTACK',

        'amount' => $paymentData['data']['amount'] / 100,

        'status' => 'APPROVED',

        'payment' => 'PAID',

        'gateway_response' => $paymentData['data']['gateway_response'] ?? null,

        'currency' => $paymentData['data']['currency'] ?? null,

        'channel' => $paymentData['data']['channel'] ?? null,

        'paid_at' => \Carbon\Carbon::parse(
        $paymentData['data']['paid_at']
        )->format('Y-m-d H:i:s') ??null,
        'customer_email' => $paymentData['data']['customer']['email'] ?? null,

        'authorization_code' => $paymentData['data']['authorization']['authorization_code'] ?? null,

        'card_type' => $paymentData['data']['authorization']['card_type'] ?? null,

        'bank' => $paymentData['data']['authorization']['bank'] ?? null,

        'last4' => $paymentData['data']['authorization']['last4'] ?? null,

        'fees' => ($paymentData['data']['fees'] ?? 0) / 100,

        'ip_address' => $paymentData['data']['ip_address'] ?? null,

        'tranref' => json_encode($paymentData),

    ]);

            return redirect()
                ->route('DuerequestHistory')
                ->with('success', 'Payment successful');
        }
    }

    return redirect()
        ->route('DuerequestHistory')
        ->with('error', 'Payment verification failed');
}




public function alumniregpaymentCallback(Request $request)
{
    $reference = $request->reference;

    if (!$reference) {
        return redirect()->back()->with('error', 'No payment reference supplied');
    }

    // Verify transaction from Paystack
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('API_SECRET_KEY'),
    ])->get("https://api.paystack.co/transaction/verify/{$reference}");

    if ($response->successful()) {

        $paymentData = $response->json();

        // Check payment status
        if ($paymentData['data']['status'] == 'success') {

            // Save transaction
  Alumnireg::where('transaction_id', $paymentData['data']['reference'])
    ->update([

        'matricno' => $paymentData['data']['metadata']['matricno'] ?? null,

        'service_type' => $paymentData['data']['metadata']['service_type'] ?? null,

        'request_method' => $paymentData['data']['metadata']['request_method'] ?? null,

        'pay_channel' => 'PAYSTACK',

        'amount' => $paymentData['data']['amount'] / 100,

        'status' => 'APPROVED',

        'payment' => 'PAID',

        'gateway_response' => $paymentData['data']['gateway_response'] ?? null,

        'currency' => $paymentData['data']['currency'] ?? null,

        'channel' => $paymentData['data']['channel'] ?? null,

        'paid_at' => \Carbon\Carbon::parse(
        $paymentData['data']['paid_at']
        )->format('Y-m-d H:i:s') ??null,
        'customer_email' => $paymentData['data']['customer']['email'] ?? null,

        'authorization_code' => $paymentData['data']['authorization']['authorization_code'] ?? null,

        'card_type' => $paymentData['data']['authorization']['card_type'] ?? null,

        'bank' => $paymentData['data']['authorization']['bank'] ?? null,

        'last4' => $paymentData['data']['authorization']['last4'] ?? null,

        'fees' => ($paymentData['data']['fees'] ?? 0) / 100,

        'ip_address' => $paymentData['data']['ip_address'] ?? null,

        'tranref' => json_encode($paymentData),

    ]);

            return redirect()
                ->route('AlumniregrequestsHistory')
                ->with('success', 'Payment successful');
        }
    }

    return redirect()
        ->route('AlumniregrequestHistory')
        ->with('error', 'Payment verification failed');
}




public function alumniServicePaystack(Request $request)
{
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('API_SECRET_KEY'),
        'Content-Type' => 'application/json',
    ])->post('https://api.paystack.co/transaction/initialize', [

        'email' => $request->email,

        // Kobo
        'amount' => $request->amount * 100,

        'payment_type' => "UNIMED ACADEMIC RECORD SERVICE FEE",

         'callback_url' => route('servicepaymentCallback'),

        // unique reference
        'reference' => $request->transaction_id,

        'metadata' => [

        'matricno' => $request->matricno,

        // 'request_method' => $request->request_method,

        // 'service_type' => $request->service_type,
    ],

    ]);

    if ($response->successful()) {

        $data = $response->json();

        return redirect($data['data']['authorization_url']);
    }

    return back()->with('error', 'Unable to initialize payment');
}


public function servicepaymentCallback(Request $request)
{
    $reference = $request->reference;

    if (!$reference) {
        return redirect()->back()->with('error', 'No payment reference supplied');
    }

    // Verify transaction from Paystack
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . env('API_SECRET_KEY'),
    ])->get("https://api.paystack.co/transaction/verify/{$reference}");

    if ($response->successful()) {

        $paymentData = $response->json();

        // Check payment status
        if ($paymentData['data']['status'] == 'success') {

            // Save transaction
  ServiceRequest::where('transaction_id', $paymentData['data']['reference'])
    ->update([

        'matricno' => $paymentData['data']['metadata']['matricno'] ?? null,

        // 'service_type' => $paymentData['data']['metadata']['service_type'] ?? null,

        // 'request_method' => $paymentData['data']['metadata']['request_method'] ?? null,

        'pay_channel' => 'PAYSTACK',

        'amount' => $paymentData['data']['amount'] / 100,

        'status' => 'APPROVED',

        'payment' => 'PAID',

        'gateway_response' => $paymentData['data']['gateway_response'] ?? null,

        'currency' => $paymentData['data']['currency'] ?? null,

        'channel' => $paymentData['data']['channel'] ?? null,

        'paid_at' => \Carbon\Carbon::parse(
        $paymentData['data']['paid_at']
        )->format('Y-m-d H:i:s') ??null,
        'customer_email' => $paymentData['data']['customer']['email'] ?? null,

        'authorization_code' => $paymentData['data']['authorization']['authorization_code'] ?? null,

        'card_type' => $paymentData['data']['authorization']['card_type'] ?? null,

        'bank' => $paymentData['data']['authorization']['bank'] ?? null,

        'last4' => $paymentData['data']['authorization']['last4'] ?? null,

        'fees' => ($paymentData['data']['fees'] ?? 0) / 100,

        'ip_address' => $paymentData['data']['ip_address'] ?? null,

        'tranref' => json_encode($paymentData),

    ]);

            return redirect()
                ->route('requestHistory')
                ->with('success', 'Payment successful');
        }
    }

    return redirect()
        ->route('requestHistory')
        ->with('error', 'Payment verification failed');
}







}
