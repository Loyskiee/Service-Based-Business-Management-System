<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Type of Service of what does a specific business do
 * 
 * Service name (e.g Fold, Wash, Haircut, etc.)
 * 
 * Price (₱200, ₱300, ₱150, etc.)
 */

class ServiceController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * where() is used similarly to use where query to filter specific records.
         * 
         * with() is used to avoid N+1 query problem.
         */
        $services = Service::where('business_id', 
        Auth::user()->business_id)->get();

        return view('service.index', compact('services'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        // validate the request
        $validated = $request->validated();

        $validated['business_id'] = Auth::user()->business_id;
        // create the request
        Service::create($validated);    

        return back();
    }


}
