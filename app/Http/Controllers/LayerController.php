<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\PointsController;
use App\Outlet;
use App\Layer;

class LayerController extends Controller
{
    public function allLayers(Request $request){
        return view('layers.layers', compact('layers'));
    }

    public function show(int $id)
    {
        return view('points.index', compact('id'));
    }
    
    public function index()
    {
        $this->authorize('manage_outlet');

        $layerQuery = Layer::query();
        $layerQuery->where('name', 'like', '%'.request('q').'%');
        $layers = $layerQuery->paginate(25);

        return view('layers.layers', compact('layers'));
    }

}
