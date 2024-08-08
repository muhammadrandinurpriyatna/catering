<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Menu;

class MenuController extends Controller
{
    public function menu()
    {
        $menus = Menu::where('user_id', Auth::user()->id)->get();

        return view('pages.menu', compact('menus'));
    }

    public function add()
    {
        return view('pages.menu-add');
    }

    public function addAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        
        $menu = new Menu;
        $menu->user_id = Auth::user()->id;
        $menu->name = $request->input('name');
        $menu->price = $request->input('price');
        $menu->description = $request->input('description');
        $image = $request->file('image');
        $imagePath = $image->store('menus');
        $imageUrl = Storage::url($imagePath);
        $menu->image_path = $imagePath;
        $menu->image_url = $imageUrl;
        $menu->save();
        
        return redirect()->route('menu')->with('success', 'Menus added successfully!');
    }

    public function edit(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        return view('pages.menu-edit', compact('menu'));
    }

    public function editAction(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
        
        $menu = Menu::findOrFail($id);
        $menu->user_id = Auth::user()->id;
        $menu->name = $request->input('name');
        $menu->price = $request->input('price');
        $menu->description = $request->input('description');
        if ($request->hasFile('image')) {
            if ($menu->image_path) {
                Storage::disk('public')->delete($menu->image_path);
            }
            $image = $request->file('image');
            $imagePath = $image->store('menus');
            $imageUrl = Storage::url($imagePath);
            $menu->image_path = $imagePath;
            $menu->image_url = $imageUrl;
        }
        $menu->save();
        
        return redirect()->route('menu')->with('success', 'Menus edited successfully!');
    }
}
