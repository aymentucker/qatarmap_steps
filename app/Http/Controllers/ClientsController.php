<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.index');
        // $clients = Client::all();
        // return response()->json($clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'companies_id' => 'required|exists:companies,id',
            'identification_number' => 'required|unique:clients',
            'client_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'status' => 'required|in:renter,owner,seller',
        ]);

        $client = Clinet::create($request->all());
        return response()->json($clinet, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            'companies_id' => 'sometimes|required|exists:companies,id',
            'identification_number' => 'sometimes|required|unique:clients,identification_number,' . $id,
            'client_name' => 'sometimes|required',
            'phone_number' => 'sometimes|required',
            'address' => 'sometimes|required',
            'status' => 'sometimes|required|in:renter,owner,seller',
        ]);

        $client->update($request->all());
        return response()->json($client, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Clinet::findOrFail($id);
        $clinet->delete();
        return response()->json(null, 204);
    }
}
