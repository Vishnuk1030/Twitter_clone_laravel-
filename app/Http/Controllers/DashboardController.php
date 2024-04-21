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

        //where content like %test%

        $ideas = Idea::when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })->orderBy("created_at", "DESC")->paginate(3);

        //ideas_count

        return view("dashboard", [
            'ideas' => $ideas
        ]);
    }
}
