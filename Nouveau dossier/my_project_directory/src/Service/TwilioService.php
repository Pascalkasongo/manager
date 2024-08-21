<?php

namespace App\Service;

use Twilio\Rest\Client;

class TwilioService
{
    private $client;
    private $whatsappFrom;

    public function __construct(string $accountSid, string $authToken, string $whatsappFrom)
    {
        $this->client = new Client($accountSid, $authToken);
        $this->whatsappFrom = $whatsappFrom;
    }

    public function sendWhatsAppMessage(string $to, string $message): void
    {
        $this->client->messages->create(
            "whatsapp:" . $to,
            [
                'from' => $this->whatsappFrom,
                'body' => $message
            ]
        );
    }
}
