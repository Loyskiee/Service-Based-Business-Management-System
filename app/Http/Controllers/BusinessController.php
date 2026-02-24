<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Http\Requests\StoreBusinessRequest;
use Illuminate\Support\Facades\Auth;

    /**
     * All about the business itself
     * 
     * Name of business
     * 
     * Address 
     * 
     * Contact of the Business
     */
    
class BusinessController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /**
         * Creating business info
         * Return a view for creating a business
         */

       // return view('business.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (StoreBusinessRequest $request)
    {
        /**
         * Storing the business info
         * 
         * In refactoring stage, put the Store Business Request
         */
    
        // Validate the request
        $validated = $request->validated();

        // Store the business 
        $business = Business::create($validated);

         // update([]) is used to change the business_id in the users table
         Auth::user()->update([
            'business_id' => $business->id,
         ]);
    
         return redirect()->route('dashboard');
    }
    
}
