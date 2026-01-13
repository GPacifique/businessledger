<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of all properties.
     */
    public function index()
    {
        // Get properties from config (can be replaced with database later)
        $properties = config('landing.portfolio.items', []);

        return view('properties.index', compact('properties'));
    }

    /**
     * Display the specified property.
     */
    public function show($id)
    {
        $properties = config('landing.portfolio.items', []);
        $property = $properties[$id] ?? null;

        if (!$property) {
            abort(404);
        }

        return view('properties.show', compact('property', 'id'));
    }
}
