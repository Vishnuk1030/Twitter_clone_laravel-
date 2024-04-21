<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // return new WelcomeEmail(auth()->user());

        $ideas = Idea::orderBy("created_at", "DESC");

        //where content like %test%
        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
        }


        //ideas_count

        return view("dashboard", [
            'ideas' => $ideas->paginate(3)
        ]);
    }
}
