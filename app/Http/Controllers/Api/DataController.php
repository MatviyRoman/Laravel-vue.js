<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data;

class DataController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'storeys' => 'nullable|integer|min:0',
            'garages' => 'nullable|integer|min:0',
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0',
        ]);

        $query = Data::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->has('bedrooms')) {
            $query->where('bedrooms', $request->input('bedrooms'));
        }

        if ($request->has('bathrooms')) {
            $query->where('bathrooms', $request->input('bathrooms'));
        }

        if ($request->has('storeys')) {
            $query->where('storeys', $request->input('storeys'));
        }

        if ($request->has('garages')) {
            $query->where('garages', $request->input('garages'));
        }

        if ($request->has('price_max') && !$request->input('price_min')) {
            $query->whereBetween('price', [0 , $request->input('price_max')]);
        }

        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('price', [$request->input('price_min'), $request->input('price_max')]);
        }

        $data = $query->take(20)
            ->orderBy('price', 'asc')
            ->get();

        return response()->json($data);
    }
}
