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

    public function categories()
    {
        $title = 'Create Category';
        return view("admin.categories", compact("title"));
    }

    public function articles()
    {
        $title = 'Create Article';
        return view("admin.articles", compact("title"));
    }
}
