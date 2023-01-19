<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outlet;
use App\Http\Resources\Outlet as OutletResource;

class PointsController extends Controller
{
    public function addPoints(Request $request){
        //$data = $request->all();

        $this->authorize('create', new Outlet);

        
        $newOutlet = $request->all();
        
        $newOutlet['creator_id'] = auth()->id();

        $outlet = Outlet::create($newOutlet);


        /*
        foreach ($data as $point) {

        }
        */
        return response(200 , "se inserto en la db");
    }
}

/*
class PointsController extends Controller
{
    public function addPoints(Request $request, $data){
        //$points = json_decode($data, true);
        //$points = $points['points'][0];
        //dd($points['points'][0]);
        //$points = $request;
        //return response()->json($request);
        //dd($data);
        //return view('points/points', compact('data'));
        return response('{"type":"FeatureCollection","features":{"type":"Feature","properties":{},"geometry":{"type":"Point","coordinates":{"0":"-34.91180034123","1":"-57.94843912124"}}}}');
    }
}
*/