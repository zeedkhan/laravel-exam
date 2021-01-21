<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('image')) {
            User::uploadAvatar($request->image);
            return redirect()->back()->with('message', 'Image Uploaded');
        }
        return redirect()->back()->with('error', 'Image upload unsuccessfully');
    }

    

    public function index()
    {


        return "Yo";
    }
};
