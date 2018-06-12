<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'table_info';

    public function regOrder($table_no,$name,$count) {
        Table::insert($table_no,$name,$count);
    }
}
