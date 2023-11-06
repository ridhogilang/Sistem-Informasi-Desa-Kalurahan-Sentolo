<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index()
    {
        return view('admin.dashboard', [
            "title" => "Dashboard - Kalurahan Sentolo",
            "dropdown1" => "Dashboard",
        ]);
    }
}
