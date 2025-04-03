<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // index
    public function index(){
        $posts = Post::where('user_id', Auth::id())->latest()->paginate(5);
        return view('users.profile' , compact('posts'));
    }

    // update
    public function update(Request $request) {

        $user = Auth::user();
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg|max:7048',
        ]);

        // Ensure the avatars directory exists
        if (!Storage::disk('public')->exists('avatars')) {
            Storage::disk('public')->makeDirectory('avatars');
        }
        
        // Delete the old avatar if it exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        // store the avatar image if present
       if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validatedData['avatar'] = $avatarPath;
        }

        // update the user's profile
        $user->update($validatedData);
        
        // redirect to the profile page with a success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
            
    }
}
