<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'table_info';

    public function regOrder($table_no,$name,$count) {
        Table::insert([
            'table_no'  => $table_no,
            'name'      => $name,
            'count'     => $count
        ]);
    }

    public function delOrder($table_no) {
        Table::where('table_no',$table_no)->delete();
    }

    public function getOrder($table_no) {
        return Table::select('name','count')->where('table_no',$table_no)->get();
    }
}
