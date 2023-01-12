<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Outlet;
use App\Http\Resources\Outlet as OutletResource;

class PointsController extends Controller
{
    public function addPoints(Request $request, $data){
        if ($data == 1) {
            //var_dump($data);
            $points = '{"type":"FeatureCollection","features":[{"type":"Feature","properties":{"id":1,"name":"COM","address":"D80 y 48","latitude":"-34.91180034123","longitude":"-57.94843912124","creator_id":1,"created_at":"2023-01-05 21:00:18","updated_at":"2023-01-05 21:00:18","coordinate":"-34.91180034123, -57.94843912124","map_popup_content":"<div class=\"my-2\"><strong>Outlet Name:<\/strong><br><a href=\"http:\/\/localhost:8000\/outlets\/1\" title=\"View COM Outlet detail\">COM<\/a><\/div><div class=\"my-2\"><strong>Outlet Address:<\/strong><br>D80 y 48<\/div><div class=\"my-2\"><strong>Coordinate:<\/strong><br>-34.91180034123, -57.94843912124<\/div>"},"geometry":{"type":"Point","coordinates":["-57.94843912124","-34.91180034123"]}},{"type":"Feature","properties":{"id":2,"name":"Cam 7 y 54","address":"7 y 54","latitude":"-34.91658631947","longitude":"-57.94715166091","creator_id":1,"created_at":"2023-01-05 21:48:26","updated_at":"2023-01-05 21:48:26","coordinate":"-34.91658631947, -57.94715166091","map_popup_content":"<div class=\"my-2\"><strong>Outlet Name:<\/strong><br><a href=\"http:\/\/localhost:8000\/outlets\/2\" title=\"View Cam 7 y 54 Outlet detail\">Cam 7 y 54<\/a><\/div><div class=\"my-2\"><strong>Outlet Address:<\/strong><br>7 y 54<\/div><div class=\"my-2\"><strong>Coordinate:<\/strong><br>-34.91658631947, -57.94715166091<\/div>"},"geometry":{"type":"Point","coordinates":["-57.94715166091","-34.91658631947"]}}]}';
        } else {
            //var_dump($data);
            $points = $data;
        }
        
        return response($points);
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