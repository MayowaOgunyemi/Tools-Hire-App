<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function listTools()
    {
        if(auth()->user()->role != 'admin' && auth()->user()->role != 'moderator'){
            return abort(403, 'Unauthorized action.');
        }
        return view('admin.manage-tools');
    }

    public function listUsers()
    {
        if(auth()->user()->role != 'admin'){
            return abort(403, 'Unauthorized action.');
        }
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
    
    public function listRentals()
    {
        if(auth()->user()->role != 'admin'){
            return abort(403, 'Unauthorized action.');
        }
        return view('admin.manage-replies');
    }

}
