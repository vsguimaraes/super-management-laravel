<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(int $arg1, int $arg2){
        // return "A soma de $arg1 + $arg2 é igual a " . ($arg1 + $arg2);
        /*return view('site.test', [
            'arg1' => $arg1,
            'arg2' => $arg2
        ]); // array associativo */
        //return view('site.test', compact('arg1', 'arg2')); // compact - deve ser o mais utilizado
        return view('site.test')->with('arg1', $arg1)->with('arg2', $arg2); // with
    }
}
