<?php

namespace App\Http\Controllers\Nutro;

use App\Http\Controllers\Controller;
use App\Models\Nutro\Statistic;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiNutroController extends Controller
{
    public function getChart(Request $request): JsonResponse
    {
        $data = Statistic::where('user_id', '=', $request->get('id'))->get(['time_of_meditation as time', 'day', 'date_time_value']);
        foreach ($data as $item)
        {
            $tmp = explode('.', $item->time);
            $item->time = $tmp[0];
            $item->day = date('d.m.Y', $item->date_time_value);
        }
        return response()->json($data);
    }
}
