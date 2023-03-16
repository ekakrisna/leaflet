<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outlet;
use App\Layer;
use Illuminate\Support\Facades\Log;
use Exception;


class LayerController extends Controller
{
    public function addLayer(Request $request){
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
            $idLayer = $newLayer->id;
            foreach ($data['points'] as $point) {
                $newOutlet = new Outlet;
                $newOutlet->name = $point['name'];
                $newOutlet->address = $point['address'];
                $newOutlet->latitude = $point['latitude'];
                $newOutlet->longitude = $point['longitude'];
                $newOutlet->layer_id = $idLayer;
                $newOutlet->description = $point['description'];
                $newOutlet->icon = $point['icon'];
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
}