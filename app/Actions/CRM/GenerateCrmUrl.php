<?php

declare(strict_types=1);

namespace App\Actions\CRM;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class GenerateCrmUrl
{
    public function execute(): string
    {
        $user = auth()->user();

        if (
            empty($user->qrcode_string)
            || empty($user->qrcode_expired_date)
            || $user->qrcode_expired_date->lt(Carbon::today())) {
            $user = $this->updateOrCreateQrCodeData($user);
        }

        return route('qrcode.validate', ['identifier' => $user->id, 'secret' => base64_encode($user->qrcode_string)]);
    }

    private function updateOrCreateQrCodeData($user): User
    {
        $user->qrcode_string = Str::random(8);
        $user->qrcode_expired_date = Carbon::today();
        $user->save();
        return $user;
    }
}
