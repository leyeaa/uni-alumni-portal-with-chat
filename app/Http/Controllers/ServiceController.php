<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequestFormRequest;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class ServiceController extends Controller
{
    //
    public function services(){
        return view('alumni.services');
    }

    public function processServiceRequest(ServiceRequestFormRequest $request){
        // dd($request);
        $request->validated();
        $formFields = $request->except(['_token','_method']);
        $formFields['matricno']=auth()->user()->matricno;
        ServiceRequest::create($formFields);

        return redirect(route('requestHistory'))->with('message','Request Successfully Submitted');
    }

    public function editServiceRequest($id){
        $serviceRequest=ServiceRequest::firstWhere('id',$id);
        return view('alumni.edit-services',[
            'serviceRequest'=>$serviceRequest
        ]);
    }

    public function updateServiceRequest(ServiceRequestFormRequest $request, $id){
        $request->validated();
        $updateRecord=$request->except(['_token','_method']);
        $previousRecord=ServiceRequest::firstWhere('id',$id);
        $previousAmount=$this->serviceFee($previousRecord->service_type,$previousRecord->request_method);
        $newAmount=$this->serviceFee($request->service_type,$request->request_method);
        if($previousAmount!=$newAmount){
            $updateRecord['transaction_id']="ARS".sprintf("%010d",mt_rand());
        }
        $previousRecord->update($updateRecord);
        return redirect(route('requestHistory'))->with('message','Request Successfully Updated');
    }
    public function requestsHistory(){
        //return all request History
        // $allRequest=ServiceRequest::where('id',1)->();
        return view('alumni.request-history');
    }

    //check price for service request
    private function serviceFee($serviceType,$requestMethod){
        if($serviceType=="Transcript"){
            switch ($requestMethod) {
                case 'Soft Copy':
                    $amount=17000;
                    break;
                case 'Student Copy':
                    $amount=17000;
                    break;
                case 'Hard Copy':
                    $amount=15000;
                    break;
                case 'Soft & Hard Copy':
                    $amount=17000;
                    break;
                default:
                    $amount=17000;
                    break;
            }
        }else{
            $amount=3000;
        }
        return $amount;
    }

    public function servicePayment($id){
        // initiate payment
        $serviceDetails=ServiceRequest::firstWhere('id',$id);
        if(is_null($serviceDetails->transaction_id)){
            $serviceDetails->transaction_id="ARS".sprintf("%010d",mt_rand());
            $serviceDetails->save();
        }
        $amount=$this->serviceFee($serviceDetails->service_type,$serviceDetails->request_method);
        $serviceDetails['amount']=$amount;
        return view('alumni.service-payment',[
            'profile'=>Auth::user()->alumniProfile,
            'serviceDetails'=>$serviceDetails
        ]);
    }

}
