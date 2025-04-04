<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function collectionDetails()
    {
        return view('admin.home.collection-details');
    }
}
