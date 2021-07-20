<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $commentsCount = Comment::count();
        $postsCount = Post::count();
        $usersCount = User::count();
        $categoriesCount = Category::count();

        return view('admin.index', compact('commentsCount', 'postsCount', 'usersCount', 'categoriesCount'));
    }
}
