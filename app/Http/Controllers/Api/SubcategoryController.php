<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategory;
class SubcategoryController extends Controller
{
    public function index(){
        return(Subcategory::all());
    }
}
