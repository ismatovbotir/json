<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TasnifController extends Controller
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

    public function handle(Request $request, ?string $any = null)
    {
        return response()->json([
            'path' => $any,
            'page' => $request->query('page', $request->query('oage')),
            'size' => $request->query('size'),
            'parameters' => $request->query(),
        ]);
    }

    public function AllHistoryTime(Request $request)
    {
        $response = Http::acceptJson()
            ->get(
                'https://tasnif.soliq.uz/api/cl-api/integration-mxik/get/all/history/time',
                $request->query()
            );

        return response(
            $response->body(),
            $response->status(),
            ['Content-Type' => $response->header('Content-Type', 'application/json')]
        );
    }
    public function Information(Request $request)
    {
        $response = Http::acceptJson()
            ->get(
                'https://tasnif.soliq.uz/api/cl-api/integration-mxik/get/information',
                $request->query()
            );
        // return response(
        //     $request->query()
        // );
        return response(
            $response->body(),
            $response->status(),
            ['Content-Type' => $response->header('Content-Type', 'application/json')]
        );
    }
    public function HistoryTime(Request $request)
    {
        $response = Http::acceptJson()
            ->get(
                'https://tasnif.soliq.uz/api/cl-api/integration-mxik/get/history/time',
                $request->query()
            );

        return response(
            $response->body(),
            $response->status(),
            ['Content-Type' => $response->header('Content-Type', 'application/json')]
        );
    }
    public function AllHistoryTimeJson(Request $request)
    {
        $response = Http::acceptJson()
            ->get(
                'https://tasnif.soliq.uz/api/cl-api/integration-mxik/get/all/history/time-json',
                $request->query()
            );

        return response(
            $response->body(),
            $response->status(),
            ['Content-Type' => $response->header('Content-Type', 'application/json')]
        );
    }
    public function ByMxik(Request $request)
    {
        $response = Http::acceptJson()
            ->get(
                'https://tasnif.soliq.uz/api/cls-api/mxik/get/by-mxik',
                $request->query()
            );

        return response(
            $response->body(),
            $response->status(),
            ['Content-Type' => $response->header('Content-Type', 'application/json')]
        );
    }
}
