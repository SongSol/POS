<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;
use Mockery\Exception;

class TableController extends Controller
{
    private $table_info = null;
    public function __construct()
    {
        $this->table_info = new Table();
    }

    public function regOrder(Request $request) {
        $order = json_decode($request->get('order'));
        $this->table_info->delOrder($request->get('table_no'));
        foreach ($order as $key=>$value) {
            if ($value == 0)
                continue;
            else
                $this->table_info->regOrder($request->get('table_no'),$key,$value);
        }
        return 'true';
    }

    public function getOrder($table_no) {
        return response()->json($this->table_info->getOrder($table_no));
    }
}
