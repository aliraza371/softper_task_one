<?php


namespace App\Services;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use App\Jobs\SendEmailJob;

class SendEmailService
{
    public function sendEmail($request)
    {
        $details = [
            'title' => $request[0]['title'],
            'body' => $request[0]['body'],
            'email' => 'aubaidfarroukh@gmail.com',
        ];

        dispatch(new SendEmailJob($details));
        dd('done');
    }

    public function fetch()
    {
        $response = Http::get(Config::get('constant.Base_URL') . 'posts');
        return json_decode($response->body(), true);
    }

}
