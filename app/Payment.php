<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    public function regPay(Array $regInfo) {
        Payment::insert($regInfo);
    }

    public function getAllProfit() {
        return Payment::select('total_price','pay_time')->get();
    }
}
