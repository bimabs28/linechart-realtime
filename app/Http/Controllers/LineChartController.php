<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LineChartModel;

class LineChartController extends Controller
{
    
    public function index()
    {

        $data = \App\Models\LineChartModel::all();
        $labels = $data->pluck('time_linechart')->toArray();
        $linechart_data = $data->pluck('linechart_data')->toArray();

        return view('linechart', ['data' => $data, 'labels' => $labels, 'linechart_data' => $linechart_data]);
    }
}