<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\State;
class StateController extends Controller
{
    public function index(){
        return(State::all());
    }
}
