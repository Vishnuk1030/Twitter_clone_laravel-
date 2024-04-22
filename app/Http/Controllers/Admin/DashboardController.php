<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $totalusers = User::count();
        $totalideas = Idea::count();
        $totalcomments = Comment::count();
        return view('admin.dashboard', compact('totalusers', 'totalideas', 'totalcomments'));
    }
}
