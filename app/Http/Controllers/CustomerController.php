<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
     * Creation of customer
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
        $validated['business_id'] = Auth::user()->business_id; // add the business_id to the validated datas
        Customer::create($validated);

        return redirect()->route('customers.index')
        ->with('success', 'Customer created'); 
    }

    public function show(Customer $customer)
    {
        $bookings = $customer->bookings()
        ->with('service', 'user')
        ->latest()
        ->paginate(10);

        return view('customer.show', compact('customer','bookings'));
    }
}
