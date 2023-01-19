<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Outlet as OutletResource;

class PointsController extends Controller
{
    public function addPoints(Request $request){
        $this->authorize('manage_outlet');

        $outletQuery = Outlet::query();
        $outletQuery->where('name', 'like', '%'.request('q').'%');
        $outlets = $outletQuery->paginate(25);

        return view('points/points', compact('outlets'));

    }
}
