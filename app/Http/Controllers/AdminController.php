<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function listTools()
    {
        return view('admin.manage-tools');
    }

    public function listUsers()
    {
        return view('admin.manage-users');
    }

    public function listReviews()
    {
        return view('admin.manage-reviews');
    }

    public function listReplies()
    {
        return view('admin.manage-replies');
    }

}
