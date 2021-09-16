<?php

declare(strict_types=1);

namespace App\Example\BadPractice;

use App\Example\SmsSenderApi;
use App\Example\User;
use Exception;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

final class SmsService
{
    public function __construct(private TokenStorageInterface $tokenStorage, private SmsSenderApi $smsSenderApi)
    {
    }

    public function sendMessage(string $message): void
    {
        /** @var $user User */
        $user = $this->tokenStorage->getToken()->getUser();

        if ($user === null) {
            throw new Exception('User does not exist in token storage');
        }

        $this->smsSenderApi->sendSms($user->phone(), $message);
    }
}
