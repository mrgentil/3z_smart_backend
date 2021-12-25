<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Module;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /* $userCount = User::all()->count();
        $productCount = Product::all()->count(); */


        //dd(auth()->user()->role->modules);
        // dd(auth()->user()->role->modules);

        /* $module_array = [];
        $modules = auth()->user()->role->modules;

        foreach ($modules as $module) {
            $module_array[] = $module->name;

            dd($module_array);
        } */

        /* $modules = auth()->user()->role->modules;
        $name_module = [];

        foreach ($modules as $item) {
            if (!isset($name_module[$item->name])) {
                $name_module[$item->name] = $item->name;
            }

             */
        // dd(auth()->user()->role->modules);

        return view('layouts.index');
    }
}
