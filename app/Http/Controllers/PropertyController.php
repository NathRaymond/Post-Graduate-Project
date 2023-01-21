<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function propertyindex()
    {
        return view('property');
    }

    public function property_details()
    {
        return view('property-details');
    }

    public function property_submit()
    {
        return view('property-submit');
    }
}
