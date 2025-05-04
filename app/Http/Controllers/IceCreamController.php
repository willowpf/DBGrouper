<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IceCream;

class IceCreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function order()
     {
        $icecreams = IceCream::all();
        return view('icorder.order', compact('icecreams'));
     }

    public function index(Request $request)
    {
         $query = IceCream::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('name', 'like', '%' . $search . '%');
    }

    $icecreams = $query->get(); // or use ->paginate() for pagination
        return view('icecreams.index', compact('icecreams'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('icecreams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'flavor' => 'required|string|max:255',
            'price' => 'required|numeric'
        ]);

        IceCream::create($request->all());

        return redirect()->route('icecreams.index')->with('success', 'Ice Cream added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         // Attempt to find the Ice Cream by ID
         $iceCream = IceCream::find($id);

         // Check if the ice cream exists
         if ($iceCream) {
             // If ice cream exists, pass it to the view
             return view('icecreams.show', compact('iceCream'));
         } else {
             // If no ice cream is found, redirect with an error message
             return redirect()->route('icecreams.index')->with('error', 'Ice Cream not found.');
         }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $iceCream = IceCream::findOrFail($id);
        return view('icecreams.edit', compact('iceCream'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'flavor' => 'required|string|max:255',
            'price' => 'required|numeric'
        ]);

        $iceCream = IceCream::findOrFail($id);
        $iceCream->update($request->all());

        return redirect()->route('icecreams.index')->with('success', 'Ice Cream updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $iceCream = IceCream::findOrFail($id);
        $iceCream->delete();

        return redirect()->route('icecreams.index')->with('success', 'Ice Cream deleted successfully!');
    }
}
