<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdSlider;
use App\Http\Resources\AdSliderCollection;



class AdSliderController extends Controller
{


    /**
     * Display a Sliders of the resource.
     */

     // Display a listing of ad sliders
    public function showSliders()
    {
        $adSliders = AdSlider::all();
        return new AdSliderCollection($adSliders);

        // return response()->json($adSliders);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
