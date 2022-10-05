<?php

namespace App\Http\Controllers\Admin;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    public function index()
    {
        $settings1 = [
            'chart_title' => 'Sales Chart',
            'chart_type' => 'bar',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Order',
            'group_by_field' => 'created_at',
            'group_by_period' => 'year',
            'aggregate_function' => 'count',
            'filter_field' => 'created_at',
            'filter_period' => 'year',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class' => 'col-md-12',
            'entries_number' => '5',
            'translation_key' => 'order',
        ];

        $chart1 = new LaravelChart($settings1);

        return view('home', compact('chart1'));
    }
}
