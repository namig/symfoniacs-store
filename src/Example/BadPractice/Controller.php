<?php

declare(strict_types=1);

namespace App\Example\BadPractice;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;

#[AsController]
final class Controller
{
    public function __construct(private SmsService $smsService)
    {
    }

    #[Route(path: '/api/sms', methods: 'POST')]
    public function sendSms(): Response
    {
        $this->smsService->sendMessage('some sms message');

        return new Response("Sms sended");
    }
}
