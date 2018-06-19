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

    public function regMenu(Request $request) {
        $this->menu->delMenu();
        for($i = 0; $i < count($request->get('menu')); $i++) {
            $this->menu->regMenu($request->get('menu')[$i]['메뉴명'],$request->get('menu')[$i]['가격']);
        }
        return 'true';
    }
}