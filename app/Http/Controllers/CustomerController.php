<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
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
        $customers = Customer::where('business_id', Auth::user()->business_id)
        ->get();

        return view('customer.index', compact('customers'));
    }

    /**
     * Creation of Customers
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        
         $validated = $request->validated();

         $validated['business_id'] = Auth::user()->business_id; // add the business to the validated datas
         
         Customer::create($validated);
                                          
        return back()->with('success', 'Customer Created!'); // back method is used to generate redirect reponse that sends back the user to the previous location
    }
}
