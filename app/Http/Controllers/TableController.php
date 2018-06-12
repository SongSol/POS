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
        /*foreach ($request[$request->keys()[0]] as $key=>$value) {
            $this->table_info->regOrder($request->keys()[0],$key,$value);
        }*/
        return $request[$request->keys()[0]];
    }
}
