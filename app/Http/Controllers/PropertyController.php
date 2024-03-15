<?php

namespace App\Http\Controllers;

use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Returns filtered properties collection
     */
    public function index(Request $request)
    {
        $properties = Property::query()
            ->when($request->name, function ($query, $name) {
                return $query->where('name', 'LIKE', "%$name%");
            })
            ->when($request->price_min, function ($query, $price_min) {
                return $query->where('price', '>=', $price_min);
            })
            ->when($request->price_max, function ($query, $price_max) {
                return $query->where('price', '<=', $price_max);
            })
            ->when($request->bedrooms, function ($query, $bedrooms) {
                return $query->where('bedrooms', $bedrooms);
            })
            ->when($request->bathrooms, function ($query, $bathrooms) {
                return $query->where('bathrooms', $bathrooms);
            })
            ->when($request->storeys, function ($query, $storeys) {
                return $query->where('storeys', $storeys);
            })
            ->when($request->garages, function ($query, $garages) {
                return $query->where('garages', $garages);
            })
            ->get();

        return PropertyResource::collection($properties)->collection;
    }
}
