<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function view()
    {
        return view('welcome');
    }
    public function users()
    {
        $users = User::all()->get();
        return view('admin.user.index', compact('users'));
    }
}
