<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone'  => 'nullable|string|max:25',
            'address'=> 'nullable|string|max:255',
            'profile_pic' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'rating' => 'nullable|numeric|min:0|max:5',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            // Delete old profile pic if exists
            if ($user->profile_pic && Storage::disk('public')->exists($user->profile_pic)) {
                Storage::disk('public')->delete($user->profile_pic);
            }
            $path = $request->file('profile_pic')->store('profile_pics', 'public');
            $validated['profile_pic'] = $path;
        }

        $user->update($validated);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}