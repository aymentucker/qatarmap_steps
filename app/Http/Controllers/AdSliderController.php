<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request, check if user is an admin or company manager

         // Validate the request, including the image
         $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust validation as necessary
            'subscription_period' => 'required|in:monthly,quarterly,semi-annually,annually'
        ]);

        if (!Storage::disk('public')->exists('images/ad_sliders')) {
            Storage::disk('public')->makeDirectory('images/ad_sliders');
        }  

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/ad_sliders', 'public');
            $data['image'] = $imagePath;
        }

          // Calculate the end date
          $startDate = Carbon::now();
          $endDate = $this->calculateEndDate($startDate, $data['subscription_period']);
          $data['end_date'] = $endDate;

          // Create the AdSlider
          $adSlider = AdSlider::create($data);

          return response()->json($adSlider, 201);

    }



    /**
     * Calculate EndDate.
     */

    private function calculateEndDate($startDate, $period)
    {
        switch ($period) {
            case 'monthly':
                return $startDate->addMonth();
            case 'quarterly':
                return $startDate->addMonths(3);
            case 'semi-annually':
                return $startDate->addMonths(6);
            case 'annually':
                return $startDate->addYear();
            default:
                return $startDate; // Or handle invalid period
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
