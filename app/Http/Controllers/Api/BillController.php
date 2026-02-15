<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return request()->user()->hostedBills;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $bill = $request->user()->hostedBills()->create([
            'name' => $validated['name'],
        ]);
        return response()->json($bill, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Bill $bill)
    {
        //
        if($bill->host_id !== $request->user()->id){
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        return response()->json($bill);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bill $bill)
    {
        //
        if($bill->host_id !== $request->user()->id){
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $bill->update($validated);
        return response()->json($bill);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Bill $bill)
    {
        if($bill->host_id !== $request->user()->id){
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $bill->delete();
        return response()->json(['message' => 'Bill deleted successfully']);
    }
}
