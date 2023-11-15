<?php

namespace App\Http\Controllers\bo\Sid;

use App\Http\Controllers\Controller;
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
        return view('bo.page.sid.dashboard', [
            "title" => "Dashboard - Kalurahan Sentolo",
            "dropdown1" => "Dashboard",
        ]);
    }
}
