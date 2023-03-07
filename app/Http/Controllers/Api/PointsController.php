<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outlet;
use App\Layer;
use App\Http\Resources\Outlet as OutletResource;
use Illuminate\Support\Facades\Log;
use Exception;


class PointsController extends Controller
{
    public function addPoints(Request $request){
        $data = $request->all();
        $outletsQuantity = 0;
        try {
            $layerData = $data['layer'];
            $newLayer = new Layer;
            $newLayer->name = $layerData['name'];
            $newLayer->description = $layerData['description'];
            $newLayer->icon = $layerData['icon'];
            $newLayer->outlets_quantity = $outletsQuantity;
            $newLayer->init_date = $layerData['init_date'];
            $newLayer->end_date = $layerData['end_date'];
            $newLayer->save();
            $idLayer = $newLayer->id();
            foreach ($data['points'] as $point) {
                //return response($point['name']);
                $newOutlet = new Outlet;
                $newOutlet->name = $point['name'];
                $newOutlet->address = $point['address'];
                $newOutlet->latitude = $point['latitude'];
                $newOutlet->longitude = $point['longitude'];
                $newOutlet->layer = $idLayer;
                $newOutlet->description = $point['description'];
                $newOutlet->creator_id = 1; //hardcodeado, usuario que creo el punto
                $newOutlet->save();
                $outletsQuantity++;
            }
            $newLayer->update(['outlets_quantity' => $outletsQuantity]);
            return response()->json("Points inserted in DB");
        } catch (Exception $e) {
            Log::error($e);
            return response()->json($e);
        }
    }

    public function index(int $id)
    {
        /*
        $this->authorize('manage_outlet');
        $id = '1';
        $outlets = Outlet::query();
        $outlets->where('layer_id', 'like', '%'.$id.'%');
        var_dump($outlets);
        */
        //$outlets = Outlet::all();
        //$id = "1";
        $outlets = Outlet::where('layer_id', $id)->get();
        //$outlets->where('layer_id', $id)->first();

        $geoJSONdata = $outlets->map(function ($outlet) {
            return [
                'type'       => 'Feature',
                'properties' => new OutletResource($outlet),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $outlet->longitude,
                        $outlet->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}