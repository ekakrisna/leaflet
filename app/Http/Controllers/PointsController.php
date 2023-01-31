<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Outlet as OutletResource;
use App\Outlet;

class PointsController extends Controller
{
    public function index(){

        $this->authorize('manage_outlet');

        $outletQuery = Outlet::query();
        $outletQuery->where('name', 'like', '%'.request('q').'%');
        $outlets = $outletQuery->paginate(25);

        return view('outlets.index', compact('outlets'));
        //return response("404"); //to do page 404
    }

    public function show(int $id){
        
        $this->authorize('manage_outlet');
        
        $outletQuery = Outlet::query();
        $outletQuery->where('layer_id', 'like', '%'.$id.'%');
        $outlets = $outletQuery->paginate(25);
        
        return view('points/points', compact('outlets'));

    }
}
