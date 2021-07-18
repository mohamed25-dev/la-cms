<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;    
    }

    public function getByUser ($id) 
    {
        $data = $this->user->with('posts', 'profile')->find($id);

        return view('users.profile', compact('data'));
    }

    public function getUserComments ($id) 
    {
        $data = $this->user->with('profile', 'comments.post')->find($id);

        return view('users.profile', compact('data'));
    }
}
