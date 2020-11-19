<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ReportOffense;
use Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function viewPayment(Request $request, $id){

    	$user_id = Auth::User()->id;
        $userDetails = User::find($user_id);
        //echo "<pre>";print_r($userDetails);die;

        $useroffenses = ReportOffense::with('offense')->first();
        //dd($useroffenses);

    	return view('payments.viewpayment', compact('userDetails', 'useroffenses'));
    }
        /**
     * Lipa na M-PESA password
     * */
    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $BusinessShortCode = 174379;
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }


    /**
     * Lipa na M-PESA STK Push method
     * */
     public function customerMpesaSTKPush(Request $request)
    {

        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
        $curl_post_data = [
            //Fill in the request parameters with valid values
            'BusinessShortCode' => 174379,
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $request->input('amount'), // transaction amount
            'PartyA' => $request->input('phoneNumber'), // user phone number
            'PartyB' => 174379,
            'PhoneNumber' => $request->input('phoneNumber'), // user phone number
            'CallBackURL' => 'https://skillsday.com/',
            'AccountReference' => "Smart Traffic Offence",
            'TransactionDesc' => "Testing stk push on sandbox"
        ];
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        return $curl_response;


        return view('client/confirmation');

    }


    public function generateAccessToken()
    {
        $consumer_key="e1U5Z7bzKDOyGAFcNsZcAMZIZaHu94vg";
        $consumer_secret="P5w2Ke3v30ixgxu3";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }

}
