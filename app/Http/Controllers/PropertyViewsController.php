<?php
namespace App\Http\Controllers;

use App\Models\PropertyView;
use Illuminate\Http\Request;

class PropertyViewsController extends Controller
{
    /**
     * Increment the view count for a property.
     *
     * @param  int $propertyId
     * @return \Illuminate\Http\Response
     */
    public function incrementViewCount($propertyId)
    {
        $propertyView = PropertyView::firstOrCreate(['property_id' => $propertyId]);
        $propertyView->increment('view_count');

        return back()->with('success', 'Property view count incremented.');
    }

    // You can add more methods as needed, for example, to display view counts in a dashboard
}
