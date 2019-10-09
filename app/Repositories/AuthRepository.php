<?php

namespace App\Repositories;

use App\User;
use Carbon\Carbon;
use Hash;

class AuthRepository
{
    public function create(array $data): User
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'initial_balance' => $data['initial_balance'],
            'expected_daily_growth' => $data['expected_daily_growth'],
            'goal' => $data['goal'],
            'expected_completion_date' => Carbon::now(),
        ]);

        app(UserBalanceRecordRepository::class)->create(
            [
                'balance' => $user->initial_balance,
            ],
            $user
        );

        return $user;
    }
}
