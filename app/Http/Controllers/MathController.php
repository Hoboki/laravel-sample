<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MathController extends Controller
{
    //足し算
    public function sum($x, $y){
        $sum=$x + $y;

        return View::make('sum', ['x'=>$x, 'y'=>$y, 'sum'=>$sum]);
    }
}
