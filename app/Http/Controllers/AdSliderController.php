<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AdSlider;


class AdSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all ad sliders from the database
        $adSliders = AdSlider::all();

        // Pass the ad sliders to the view
        return view('adsliders.index', compact('adSliders'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // If you have any data that needs to be sent to the view, like categories or types, fetch them here
        // For example, if you had subscription periods predefined, you could pass them to the view
        $subscriptionPeriods = [
            'monthly' => 'Monthly',
            'quarterly' => 'Quarterly',
            'semi-annually' => 'Semi-Annually',
            'annually' => 'Annually',
        ];

        // Return the create view with any necessary data
        return view('adsliders.create', compact('subscriptionPeriods'));
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
            'url_link' => 'required|url', // Validation for url_link
            'subscription_period' => 'required|in:monthly,quarterly,semi-annually,annually'
        ]);

        if (!Storage::disk('public')->exists('images/ad_sliders')) {
            Storage::disk('public')->makeDirectory('images/ad_sliders');
        }  

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/ad_sliders', 'public');
            // Generate the full URL for the image
            $data['image'] = asset(Storage::url($imagePath));
        }

          // Calculate the end date
          $startDate = Carbon::now();
          $endDate = $this->calculateEndDate($startDate, $data['subscription_period']);
          $data['end_date'] = $endDate;

          // Create the AdSlider
          $adSlider = AdSlider::create($data);


          // Redirect to the 'adsliders.index' view with ad sliders data
          return redirect()->route('adsliders.index')->with('success', 'Ad Slider created successfully.');
      
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
    public function edit($id)
    {
        // Find the ad slider by its ID. If it doesn't exist, redirect back or show a 404 page.
        $adSlider = AdSlider::find($id);
        if (!$adSlider) {
            // Redirect back or show a 404 error. This is up to your application's needs.
            return redirect()->route('adsliders.index')->withErrors('Ad Slider not found.');
        }

        // Pass the ad slider to the edit view.
        // Assuming you're using a view located at resources/views/adsliders/edit.blade.php
        return view('adsliders.create', compact('adSlider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the ad slider by id
        $adSlider = AdSlider::findOrFail($id);

        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url_link' => 'required|url',
            'subscription_period' => 'required|in:monthly,quarterly,semi-annually,annually',
        ]);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            if (!Storage::disk('public')->exists('images/ad_sliders')) {
                Storage::disk('public')->makeDirectory('images/ad_sliders');
            }
            
            // Store the new image and generate the full URL
            $imagePath = $request->file('image')->store('images/ad_sliders', 'public');
            $data['image'] = asset(Storage::url($imagePath));

            // Optionally, delete the old image file from storage
            $oldImagePath = str_replace(asset(''), '', $adSlider->image);
            Storage::disk('public')->delete($oldImagePath);
        } else {
            // Keep the old image if a new one wasn't uploaded
            $data['image'] = $adSlider->image;
        }

        // Calculate the end date based on the subscription period
        $startDate = Carbon::now();
        $endDate = $this->calculateEndDate($startDate, $data['subscription_period']);
        $data['end_date'] = $endDate;

        // Update the ad slider with validated data
        $adSlider->update($data);

        // Redirect back or to another page with success message
        return redirect()->route('adsliders.index')->with('success', 'Ad Slider updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Find the ad slider by ID
            $adSlider = AdSlider::findOrFail($id);

            // If the ad slider has an associated image, delete it from storage
            if ($adSlider->image) {
                // Assuming the 'image' attribute stores the path to the file in the storage disk
                Storage::disk('public')->delete($adSlider->image);
            }

            // Delete the ad slider from the database
            $adSlider->delete();

            // Redirect to the ad sliders index page with a success message
            return redirect()->route('adsliders.index')->with('success', 'Ad Slider deleted successfully.');
        } catch (\Exception $e) {
            // If there's an error, redirect back with an error message
            return back()->withErrors(['error' => 'An error occurred while deleting the ad slider: ' . $e->getMessage()]);
        }
    }
}
