<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Menu;

class CateringController extends Controller
{
    public function catering(Request $request)
    {
        $search = $request->input('search');
        $caterings = User::where('role', 'merchant')
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('description', 'like', "%{$search}%")
                          ->orWhere('contact', 'like', "%{$search}%")
                          ->orWhere('address', 'like', "%{$search}%");
                });
            })
            ->get();

        return view('pages.catering', compact('caterings'));
    }

    public function cateringDetail(Request $request, $id)
    {
        $caterings = Menu::where('user_id', $id)->get();

        return view('pages.catering-detail', compact('caterings'));
    }
}
