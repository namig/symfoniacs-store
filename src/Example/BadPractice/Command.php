<?php

declare(strict_types=1);

namespace App\Example\BadPractice;

use App\Example\User;

final class Command
{
    public function __construct(private SmsService $smsService)
    {
    }

    // Предположим нам надо отправить смс юзерам из эксель таблицы, в которой есть телефоны
    public function run()
    {
        $users = $this->extractUsersFromExcelFile();

        // Внутри попытаемся вытащить токен, которого не бывает в команде
        // Мы не сможем отправить одному юзеру, не говоря уже о нескольких
        $this->smsService->sendMessage('some-message');
    }

    private function extractUsersFromExcelFile(): array
    {
        return [
            new User(1, '+79998887766'),
            new User(2, '+70001112233'),
            new User(3, '+70001112244'),
        ];
    }
}
