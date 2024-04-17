<?php

namespace App\Service;

use YooKassa\Client;

class PaymentService
{
    public static function getClient(): Client
    {
        $client = new Client();
        $client->setAuth(config('payment_system.youcassa.id'),config('payment_system.youcassa.secret'));

        return $client;
    }
}
