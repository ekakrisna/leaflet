<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/health",
     *     summary="Health check",
     *     tags={"Leaflet"},
     *     @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent(
     *              type="object",
     *              example={ "name": "Leaflet", "version": "1.0.0", "status": true }
     *          )
     *     )
     * )
     *
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'name' => env('APP_NAME', 'Leaflet'),
            'version' => env('APP_VERSION', '1.0.0'),
            'status' => true
        ]);
    }
}
