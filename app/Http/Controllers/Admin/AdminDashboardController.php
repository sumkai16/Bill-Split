<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        $totalUsers = User::count();
        $verifiedUsers = User::whereNotNull('email_verified_at')->count();
        $adminUsers = User::where('account_type', 'admin')->count();

        return view('admin.dashboard', compact(
            'users',
            'totalUsers',
            'verifiedUsers',
            'adminUsers'
        ));
    }
}
