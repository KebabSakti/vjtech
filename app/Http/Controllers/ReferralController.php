<?php

namespace App\Http\Controllers;

use App\Models\Marketer;
use App\Models\Referral;

class ReferralController extends Controller
{
    public function referral($phone = null)
    {
        if (!empty($phone)) {
            $marketer = Marketer::where('phone', $phone)->first();
            if (!empty($marketer)) {
                Referral::create([
                    'phone' => $phone,
                    'ip' => $_SERVER['REMOTE_ADDR'],
                ]);
            }
        }

        return redirect()->away('http://bit.ly/wa-vjtech');
    }

    public function client()
    {
        $data = Referral::all();

        return view('admin.client.index', ['data' => $data]);
    }
}
