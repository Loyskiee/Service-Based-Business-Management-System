<?php

namespace App\Http\Controllers;

use App\Models\ServiceJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Transaction of the Service
 * 
 * Is it complete
 * 
 * When was the schedule given, etc.
 */
class ServiceJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * fetch the model with customer, service, and user
         * 
         *  wherein you will get the authenticated business_id
         */

        $serviceJob = ServiceJob::with(['customer', 'service', 'user'])
        ->where('business_id', Auth::user()->business_id)
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the request
        $validated = $request->validate([
            'customer_id'  => 'required|exists:customers,id',
            'service_id'   => 'required|exists:services,id',
            'scheduled_at' => 'required|date',
        ]);

        // create the request
        ServiceJob::create([$validated, 
        'business_id' => Auth::user()->business_id,
        'user_id' => Auth::id(),
        'status' => 'pending'
        ]);

        return back();
    }

    
}
