<?php

namespace App\Http\Controllers\Web_pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function index(){
        return view('Web_pages.index');
      }
}
