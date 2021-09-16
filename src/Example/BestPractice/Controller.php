<?php

declare(strict_types=1);

namespace App\Example\BestPractice;

use App\Example\User;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[AsController]
final class Controller
{
    public function __construct(private SmsService $smsService, private TokenStorageInterface $tokenStorage)
    {
    }

    #[Route(path: '/api/sms', methods: 'POST')]
    public function sendSms(): Response
    {
        /** @var User $user */
        $user = $this->tokenStorage->getToken()->getUser();

        if ($user === null) {
            throw new Exception('User does not exist in token storage');
        }

        $this->smsService->sendMessage($user->phone(), 'some-message from request');

        return new Response("Sms sended");
    }
}
