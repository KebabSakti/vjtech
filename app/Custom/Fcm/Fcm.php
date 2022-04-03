<?php
namespace App\Custom\Fcm;

use App\Models\Visitor;
use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;

class Fcm
{
    public static function subscribe($token)
    {
        $url = "https://iid.googleapis.com/iid/v1:batchAdd";
        $token = $token;
        $topic = "/topics/visit";
        $headers = [
            "Content-Type: application/json",
            "Authorization: key=AAAAu3YZZ4g:APA91bG5ZrPsBkkQB5g3EsRHdjQpDviCdw4m7fJPRQQ36S9D4IQDyx-a8ewp2gSq0yvgCGBSAvFgkgFd6D9dzmjwnOpBU-4-2ch2GanyIsoS34jRFKZWyHPLJmfCjWCnP-yKg9OxY9KO",
        ];
        $datas = [
            "to" => $topic,
            "registration_tokens" => array($token),
        ];

        $response = Curl::to($url)
            ->withHeaders($headers)
            ->withData($datas)
            ->asJson()
            ->returnResponseObject()
            ->post();

        return $response;
    }

    public static function send($token = null)
    {
        $visitor = Visitor::whereDate('created_at', Carbon::now()->format('Y-m-d'))->get();
        $url = "https://fcm.googleapis.com/fcm/send";
        $target = $token ?? "/topics/visit";
        $headers = [
            "Content-Type: application/json",
            "Authorization: key=AAAAu3YZZ4g:APA91bG5ZrPsBkkQB5g3EsRHdjQpDviCdw4m7fJPRQQ36S9D4IQDyx-a8ewp2gSq0yvgCGBSAvFgkgFd6D9dzmjwnOpBU-4-2ch2GanyIsoS34jRFKZWyHPLJmfCjWCnP-yKg9OxY9KO",
        ];
        $datas = [
            "to" => $target,
            "notification" => [
                "title" => "Alhamdulillah ada client",
                "body" => "Total pengunjung hari ini " . $visitor->count() . " user",
                "icon" => "./img/LOGO.png",
            ],
        ];

        $response = Curl::to($url)
            ->withHeaders($headers)
            ->withData($datas)
            ->asJson()
            ->returnResponseObject()
            ->post();

        return $response;
    }
}
