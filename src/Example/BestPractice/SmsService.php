<?php

declare(strict_types=1);

namespace App\Example\BestPractice;

use App\Example\SmsSenderApi;

final class SmsService
{
    public function __construct(private SmsSenderApi $smsSenderApi)
    {
    }

    public function sendMessage(string $phone, string $message): void
    {
        $this->smsSenderApi->sendSms($phone, $message);
    }
}
