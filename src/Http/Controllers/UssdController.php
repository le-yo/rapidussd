<?php

namespace leyo\rapidussd\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use leyo\rapidussd\Http\models\ussd_logs;
use leyo\rapidussd\Http\models\ussd_user;

class UssdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        error_reporting(0);
        header('Content-type: text/plain');
        set_time_limit(100);

        //get inputs
        $sessionId   = $_REQUEST["sessionId"];
        $serviceCode = $_REQUEST["serviceCode"];
        $phoneNumber = $_REQUEST["phoneNumber"];
        $text        = $_REQUEST["text"];   //


        $data = ['phone'=>$phoneNumber,'text'=> $text, 'service_code'=>$serviceCode,'session_id'=>$sessionId];

        //log USSD request
        ussd_logs::create($data);

        //verify that the user exists
        $no = substr($phoneNumber,-9);

        $user = ussd_user::where('phone_no',"0".$no)->orWhere('phone_no',"254".$no)->first();

        if (!$user) {
            //if user phone doesn't exist, we check out if they have been registered to mifos
            $user = self::verifyPhonefromMifos($no);
        }
        if (!$user) {
            //$response_ussd = "Welcome to Watu Credit".PHP_EOL."Short Term Loans".PHP_EOL."1. Loans: Ksh 1,000 To Ksh 50,000".PHP_EOL."2. Loan Term: 1 Month".PHP_EOL."3. Option To Extend Loan".PHP_EOL."4. Disbursement: Within 24 Hours".PHP_EOL."5. Interest Rate: 10% Per Month".PHP_EOL."6. Fees: None";
            $response_ussd = "Watu Credit Short Term Loans".PHP_EOL."1. Loans: up-to Ksh 50,000".PHP_EOL."2. Loan Term: 1 Month".PHP_EOL."3. Option To Extend Loan".PHP_EOL."4. Disbursement: Within 24 Hr".PHP_EOL."5. Interest Rate: 10% pm".PHP_EOL."6. Fees: None";
            $response_sms =  "Watu Credit Short Term Loans".PHP_EOL."1. Loans: up-to Ksh 50,000".PHP_EOL."2. Loan Term: 1 Month".PHP_EOL."3. Option To Extend Loan".PHP_EOL."4. Disbursement: Within 24 Hr".PHP_EOL."5. Interest Rate: 10% pm".PHP_EOL."6. Fees: None".PHP_EOL."Requirements".PHP_EOL."1. ID: National ID".PHP_EOL."2. Group Size: Min. 5 Members".PHP_EOL."3. Guarantee: 4 Group Members".PHP_EOL."Call 0790 000 999 For Registration";

            //$response_sms = "Welcome to Watu Credit".PHP_EOL."Short Term Loan(s)".PHP_EOL."1. Loans: Ksh 1,000 To Ksh 50,000".PHP_EOL."2. Loan Term: 1 Month/Option To Extend".PHP_EOL."3. Disbursement: Within 24 Hours".PHP_EOL."4. Interest Rate: 10% Per Month".PHP_EOL."5. Fees: None".PHP_EOL."Requirements".PHP_EOL."1. Identification: National ID".PHP_EOL."2. Group Size: Minimum 5 Members".PHP_EOL."3. Guarantee: 4 Group Members".PHP_EOL."4. Loan History: Good".PHP_EOL."Call 0729 405 464 For Registration";
            $notify = new NotifyController();
            $notify->sendSms($phoneNumber,$response_sms);
            self::sendResponse($response_ussd,3,$user);
            exit;
        }


        if(self::user_is_starting($text)){
            //lets get the home menu
            //reset user
            self::resetUser($user);
            //user authentication
            $message = '';
            $response = self::authenticateUser($user,$message);

            self::sendResponse($response,1,$user);
        }else{
            //message is the latest stuff
            $result = explode("*", $text);
            if (empty($result)) {
                $message = $text;
            } else {
                end($result);
                // move the internal pointer to the end of the array
                $message = current($result);
            }
            //store ussd response


            //switch based on user session
//		print_r($user);
//			exit;
            switch ($user->session) {

                case 0 :
                    //neutral user
                    break;
                case 1 :
                    //user authentication
                    $response = self::authenticateUser($user, $message);
                    break;
                case 2 :
                    $response = self::continueUssdProgress($user,$message);
                    //echo "Main Menu";
                    break;
                case 3 :
                    //confirm USSD Process
                    $response = self::confirmUssdProcess($user,$message);
                    break;
                case 4 :
                    //Go back menu
                    $response = self::confirmGoBack($user,$message);
                    break;
                case 5 :
                    //Go back menu
                    $response = self::resetPIN($user,$message);
                    break;
                default:
                    break;
            }

            self::sendResponse($response,1,$user);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
