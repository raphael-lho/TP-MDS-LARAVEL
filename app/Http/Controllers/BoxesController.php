<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boxes;

class BoxesController extends Controller
{
    /**
     * Display a listing of the boxes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Contracts\View\View // Specify the return type
    {
        $boxes = Boxes::all();
        return view('locations', compact('boxes'));
    }
}
