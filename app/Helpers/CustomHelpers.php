<?php

use Illuminate\Support\Facades\Request;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

/**
 *
 * Set active css class if the specific URI is current URI
 *
 * @param string $path       A specific URI
 * @param string $class_name Css class name, optional
 * @return string            Css class name if it's current URI,
 *                           otherwise - empty string
 */
function setActive(string $path, string $class_name = "is-active")
{
    return Request::path() === $path ? $class_name : "";
}


 function send_sms_to_user($user_phone, $code)
{

    ini_set("soap.wsdl_cache_enabled", "0");
    $sms_client = new SoapClient('http://payamak-service.ir/SendService.svc?wsdl', array('encoding' => 'UTF-8'));

    try {
        $parameters['userName'] = "titrapp";
        $parameters['password'] = "mdmd3711";
        $parameters['fromNumber'] = "10002147";
        $parameters['toNumbers'] = array($user_phone);
        $parameters['messageContent'] = "   کد فعالسازی تیتراَپ: $code ";
        $parameters['isFlash'] = false;
        $sms_client->SendSMS($parameters)->SendSMSResult;

        return true;

    } catch (Exception $e) {
        return  $e;
    }


}


function send_notif($token,$title,$body)
{
    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60 * 20);

    $notificationBuilder = new PayloadNotificationBuilder($title);
    $notificationBuilder->setBody($body)
        ->setSound('default');

    $dataBuilder = new PayloadDataBuilder();
    $dataBuilder->addData(['a_data' => 'my_data']);

    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
    $data = $dataBuilder->build();


    $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

    $downstreamResponse->numberSuccess();
    $downstreamResponse->numberFailure();
    $downstreamResponse->numberModification();

    // return Array - you must remove all this tokens in your database
    $downstreamResponse->tokensToDelete();

    // return Array (key : oldToken, value : new token - you must change the token in your database)
    $downstreamResponse->tokensToModify();

    // return Array - you should try to resend the message to the tokens in the array
    $downstreamResponse->tokensToRetry();

    // return Array (key:token, value:error) - in production you should remove from your database the tokens
    $downstreamResponse->tokensWithError();

    return true;
}


function send_multi_notif($users , $title,$body)
{
    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60*20);

    $notificationBuilder = new PayloadNotificationBuilder($title);
    $notificationBuilder->setBody($body)
        ->setSound('default');

    $dataBuilder = new PayloadDataBuilder();
    $dataBuilder->addData(['a_data' => 'my_data']);

    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
    $data = $dataBuilder->build();

// You must change it to get your tokens
    $tokens = \App\Device::whereIn('user_id',$users)->pluck('reg_id')->toArray();

    $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

    $downstreamResponse->numberSuccess();
    $downstreamResponse->numberFailure();
    $downstreamResponse->numberModification();

// return Array - you must remove all this tokens in your database
    $downstreamResponse->tokensToDelete();

// return Array (key : oldToken, value : new token - you must change the token in your database)
    $downstreamResponse->tokensToModify();

// return Array - you should try to resend the message to the tokens in the array
    $downstreamResponse->tokensToRetry();

// return Array (key:token, value:error) - in production you should remove from your database the tokens present in this array
    $downstreamResponse->tokensWithError();

    return true;

}
