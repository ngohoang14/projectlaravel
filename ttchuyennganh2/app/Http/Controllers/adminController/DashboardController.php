<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  
    public function index()
    {
       return view('admin.homeView');
    }
}