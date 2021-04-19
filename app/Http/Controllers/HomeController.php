<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view.dashboard',['only' => ['index']]);
    }
    
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Orders by Months',
            'report_type' => 'group_by_date',
            'model' => 'App\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart = new LaravelChart($chart_options);
        return view('dashboard',compact('chart'));
    }
    public function settings()
    {
        return view('settings');
    }
}
