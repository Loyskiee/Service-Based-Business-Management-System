<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
/**
 * create and store user 
 * 
 */
class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
         $validated = $request->validated();
         $validated['business_id'] = Auth::user()->business_id;
         $validated['role'] = 'staff';
         User::create($validated);

         return redirect()->route('dashboard')->with('staff_create', 'Staff Created!');
    }
}
