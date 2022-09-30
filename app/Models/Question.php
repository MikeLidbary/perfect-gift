<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Twilio\Rest\Client;


class Question extends Model
{
    use HasFactory;

    /**
     * Send whatsapp message
     * @param $to
     * @param $image_path
     * @return string
     */
    public static function send($to,$response){

        $from = config('services.twilio.whatsapp_number');

        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.auth_token'));

        return $twilio->messages->create('whatsapp:' . $to, [
            "from" => 'whatsapp:' . $from,
            "body" => $response,
        ]);
    }
}
