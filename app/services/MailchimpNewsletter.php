<?php

namespace App\Services;
use MailchimpMarketing\ApiClient;

class Newsletter implements Newsletter
{

    public function __construct()
    {

    }


    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers'); // ??= is a null operator, if the variable is null it gives the variable the value on the right.

        return $this->client()->lists->addListMember($list, [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    }

    protected function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14'
        ]);
    }
}
