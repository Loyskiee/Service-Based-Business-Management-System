<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
Use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
/**
 * create and store user 
 * 
 */
class UserController extends Controller
{
    public function index()
    {
        $staffs = User::where('business_id', Auth::user()->business_id)
        ->where('role', 'staff')
        ->get();
        
        return view('user.index', compact('staffs'));
    }
    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        Gate::authorize('admin');
        
         $validated = $request->validated();
         $validated['business_id'] = Auth::user()->business_id;
         $validated['role'] = 'staff';
         User::create($validated);

         return redirect()->route('dashboard')->with('staff_create', 'Staff Created!');
    }
}
