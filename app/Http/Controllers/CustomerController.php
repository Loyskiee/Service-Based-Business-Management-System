<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * All about the customer of the Business
 * 
 * Name
 * 
 * Contact
 */
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::where('business_id', 
        Auth::user()->business_id)->get();

        //return view('customers.index', compact('customers));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'contact' => ['required', 'string', 'max:11']
        ]);

        Customer::create([$validated, 
        'business_id' => Auth::user()->business_id,]);

        return back()->with('Customer Created!'); // back method is used to generate redirect reponse that sends back the user to the previous location
    }

}
