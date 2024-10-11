<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitStatisticsModel;
use Illuminate\Http\Request;

class VisitStatisticsController extends Controller
{
    public function index(){
        $statistics = VisitStatisticsModel::orderBy('time_statistic', 'desc')->paginate(10);
        return view('admin/visit_statistics', ['statistics' => $statistics]);
    }
}
