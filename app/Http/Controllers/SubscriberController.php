<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index() {
        $users = User::all();
        return view('admin.pages.subscriber.list', compact('users'));
    }
}
