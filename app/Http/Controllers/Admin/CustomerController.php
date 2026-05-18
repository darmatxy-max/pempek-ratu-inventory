<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::withCount('pesanans')
                        ->withSum('pesanans', 'total_harga')
                        ->latest()
                        ->get();

        return view('admin.customer.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = Customer::with('pesanans')->findOrFail($id);

        return view('admin.customer.show', compact('customer'));
    }
}