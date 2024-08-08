<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('pages.profile');
    }

    public function profileAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'nullable',
            'contact' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            if ($user->image_path) {
                Storage::disk('public')->delete($user->image_path);
            }

            $image = $request->file('image');
            $imagePath = $image->store('profiles');
            $imageUrl = Storage::url($imagePath);

            $user->image_path = $imagePath;
            $user->image_url = $imageUrl;
        }

        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->contact = $request->input('contact');
        $user->description = $request->input('description');
        $user->save();
        
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}