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
    private $payment    = null;
    private $table_info = null;

    public function __construct()
    {
        $this->payment    = new Payment();
        $this->table_info = new Table();
    }

    public function payment(Request $request) {
        $payInfo = array([
            'table_no'      => $request->get('table_no'),
            'total_price'   => $request->get('total_price'),
            'pay_type'      => $request->get('method'),
            'pay_time'      => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        $this->payment->regPay($payInfo);
        $this->table_info->delOrder($request->get('table_no'));

        return 'true';
    }

    public function getProfit($date) {
        $result = Payment::where('pay_time','like',$date.'%')->orderBy('pay_time','asc')->get();
        return response()->json($result);
    }

    public function getAllProfit() {
        return response()->json($this->payment->getAllProfit());
    }
}
