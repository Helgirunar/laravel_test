<?php

namespace App\Services;

class Newsletter
{

    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers'); // ??= is a null operator, if the variable is null it gives the variable the value on the right.

        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14'
        ]);

        return $mailchimp->lists->addListMember($list, [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    }
}
