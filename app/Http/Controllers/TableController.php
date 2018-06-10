<?php

namespace App\Http\Controllers;

use App\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    private $table_info = null;
    public function __construct()
    {
        $this->table_info = new Table();
    }

    public function regOrder(Request $request) {
        /*return response()->json($request);*/
        return "dfdf";
    }
}
