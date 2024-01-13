<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Application;


class ApplicationController extends Controller
{
    public function recentapplication()
    {

        $applications = Application::join('users', 'application.user_id', '=', 'users.id')
        ->select('application.id as id', 'application.updated_at as update', 'application.application_type as type', 'users.name as lastname', 'users.firstname as firstname', 'users.email as user_email')
        ->orderByDesc('application.updated_at')
        ->limit(7)
        ->get();

        return view('dashboards.admin_dashboard', ['applications' => $applications]);
    }
}
