<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $title = 'Create User';
        return view("admin.users", compact("title"));
    }
}
