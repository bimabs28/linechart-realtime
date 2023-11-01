<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineChartModel;

class ChartController extends Controller
{
      public function readdata(){
        $data = \App\Models\LineChartModel::orderBy('time_linechart', 'DESC')->first();
        return response()->json($data);
    }
}