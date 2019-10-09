<?php

namespace App\Repositories;

use App\User;
use App\UserBalanceRecord;
use Auth;
use Carbon\Carbon;

class UserBalanceRecordRepository
{
    public function create(array $data, User $user): UserBalanceRecord
    {
        $latestBalanceRecord = $user->userBalanceRecords()->latest()->first();

        // TODO: test creating new user..
        $userBalanceRecord = $user->userBalanceRecords()->create([
            'balance' => $data['balance'],
            'day_count' => $latestBalanceRecord ? $latestBalanceRecord->day_count + 1 : 1,
        ]);

        $expectedCompletionDate = $this->calculateExpectedCompletionDate($user);

        $user->update([
            'expected_completion_date' => $expectedCompletionDate,
        ]);

        return $userBalanceRecord;
    }

    private function calculateExpectedCompletionDate(User $user): Carbon {
        $daysRequired = 0;

        $latestBalanceRecord = $user->userBalanceRecords()->latest()->first();

        $dailyBalance = $latestBalanceRecord->balance;

        while ($dailyBalance < $user->goal) {
            $dailyBalance *= $user->expected_daily_growth / 100 + 1;
            $daysRequired++;
        }

        return Carbon::now()->addWeekdays($daysRequired);
    }

}
