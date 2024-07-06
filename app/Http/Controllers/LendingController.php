<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Lending;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LendingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $userId = Auth::id();
        $lendings = Lending::where('lender_id', $userId)
                            ->orWhere('borrower_id', $userId)
                            ->with(['product', 'lender', 'borrower'])
                            ->get();
        return view('lendings.index', compact('lendings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($product) {
        $product = Product::findOrFail($product);
        return view('lendings.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date'
        ]);

        $product = Product::findOrFail($request->product_id);

        $lending = new Lending([
            'product_id' => $product->id,
            'lender_id' => $product->user_id,
            'borrower_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => 'pending'
        ]);

        $lending->save();

        return redirect()->route('lendings.index');
    }

    /**
     * Updates the status of the specified resource.
     */
    public function updateStatus(Lending $lending, $status) {
        if (Auth::id() === $lending->lender_id) {
            $lending->update(['status' => $status]);
        }
        return redirect()->route('lendings.index'); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lending $lending) {
        $products = Product::all();
        $users = User::all();
        return view('lendings.edit', compact('lending', 'products', 'users'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lending $lending) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'lender_id' => 'required|exists:users,id',
            'borrower_id' => 'required|exists:users,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:pending,accepted,returned'
        ]);

        $lending->update($request->all());

        return redirect()->route('admin.lendings')->with('status', 'Lending updated successfully.');
    }
}
