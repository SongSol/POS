<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    private $menu = null;
    public function __construct()
    {
        $this->menu = new Menu();
    }

    public function getMenu() {
        return response()->json(Menu::select('name','price')->get());
    }
}