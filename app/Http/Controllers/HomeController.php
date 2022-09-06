<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use \DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('dashboard');
    }
}