<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use ImageUploadTrait;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getByUser($id)
    {
        $data = $this->user->with('posts', 'profile')->find($id);

        return view('users.profile', compact('data'));
    }

    public function getUserComments($id)
    {
        $data = $this->user->with('profile', 'comments.post')->find($id);

        return view('users.profile', compact('data'));
    }

    public function settings()
    {
        $user = $this->user->with('profile')->find(auth()->id());
        return view('users.settings', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required'
        ]);


        if (request()->hasFile('avatar_file')) {
            $avatar = $this->uploadAvatar(request('avatar_file'));
            $request->merge(['avatar' => $avatar]);
        }

        auth()->user()->update($data);
        auth()->user()->profile()->updateOrCreate(
            ['user_id' => auth()->id()],
            $request->only(['bio', 'website', 'avatar']
        ));


        return back()->with('success', trans('alerts.success'));
    }
}
