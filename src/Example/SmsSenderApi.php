<?php

declare(strict_types=1);

namespace App\Example;

interface SmsSenderApi
{
    public function sendSms(string $phone, string $message): void;
}
