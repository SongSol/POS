<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Profit;
use App\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfitController extends Controller
{
    private $profit     = null;
    private $payment    = null;
    private $table_info = null;

    public function __construct()
    {
        $this->profit     = new Profit();
        $this->payment    = new Payment();
        $this->table_info = new Table();
    }

    public function payment(Request $request) {
        $payInfo = array([
            'table_no'      => $request->get('table_no'),
            'total_price'   => $request->get('total_price'),
            'pay_type'      => $request->get('method'),
            'created_at' => Carbon::now()->format('Y-m-d H:i'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i')
        ]);
        $this->payment->regPay($payInfo);
        $this->table_info->delOrder($request->get('table_no'));

        return 'true';
    }

    public function todayProfit($date) {
        $result = Payment::select('total_price')->where('created_at','like',$date.'%')->get();
        $todayProfit = 0;

        for ($i = 0; $i < count($result); $i++) {
            $todayProfit += $result[$i]['total_price'];
        }

        return $todayProfit;
    }
}
