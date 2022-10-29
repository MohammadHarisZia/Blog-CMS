<?php

namespace App\Http\Controllers\Pages;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipController extends Controller
{

    public function __construct()
    {
        return $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $plans = Plan::all();
        return view('pages.membership.index', compact("plans"));
    }
}
