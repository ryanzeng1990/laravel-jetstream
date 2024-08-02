<?php

declare(strict_types=1);

namespace App\Actions\CRM;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;

class ValidateCrmQrCode
{
    public function execute(User $user, array $data): bool
    {
        if ($user->qrcode_string !== base64_decode(Arr::get($data, 'secret'))) {
            return false;
        }

        if ($user->qrcode_expired_date->lt(Carbon::today())) {
            return false;
        }

        return true;
    }
}
