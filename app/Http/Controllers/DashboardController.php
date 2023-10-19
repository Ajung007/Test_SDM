<?php

namespace App\Http\Controllers;

use App\Models\answer;
use App\Models\question;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        return view('sdm.home');
    }



 



}