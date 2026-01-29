<?php

namespace App\Http\Controllers;

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

        // return view service
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the request
        $validated = $request->validate([
            'service_name' => ['required', 'string', 'min:5'],
            'price' => ['required', 'numeric']
        ]);

        // create the request
            Service::create([$validated, 
        'business_id' => Auth::user()->business_id,]);

        return back();
    }

}
