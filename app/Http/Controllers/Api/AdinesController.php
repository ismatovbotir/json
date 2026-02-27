<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Psy\sh;

class AdinesController extends Controller
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
        return response()->json([
            'status' => 'ok',
            'data' => [
                'code' => '123456',
                'name' => 'Adines',
                'mark' => '123456',
                'barcodes' => [
                    '123456',
                    '123456',
                ],
                'stock' => [
                    ['shop' => 'shop1', 'stock' => 10],
                    ['shop' => 'shop2', 'stock' => 20],

                ],
                'prices' => [
                    ['name' => 'buy', 'value' => 100],
                    ['name' => 'sell', 'value' => 200],
                ],
            ]
        ]);
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
    public function auth(Request $request)
    {
        return response()->json([
            'status' => 'ok',
        ]);
    }
}
