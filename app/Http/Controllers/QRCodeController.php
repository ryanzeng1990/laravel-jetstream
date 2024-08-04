<?php

namespace App\Http\Controllers;

use App\Actions\CRM\ValidateCrmQrCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class QRCodeController extends Controller
{
    public function validate(Request $request)
    {
        $payload = $request->all();
        $user = User::find(Arr::get($payload, 'identifier'));

        if (
            empty($payload['identifier'])
            || empty($payload['secret'])
            || !$user
        ) {
            return view('404');
        }

        $isValid = (new ValidateCrmQrCode())->execute($user, $payload);
        if (!$isValid) {
            return view('404');
        }

        $user->update(['qrcode_view' => ($user->qrcode_view + 1)]);

        return view('qrcode.validated-qrcode', [
            'user' => $user->load('company'),
            'content' => 'successfully'
        ]);
    }
}
