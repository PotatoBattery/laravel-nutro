<?php

namespace App\Http\Controllers\Nutro;

use App\Http\Controllers\Controller;
use App\Models\Nutro\Statistic;
use App\Models\User;
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

    public function saveProfileField(Request $request)
    {
        $requestData = $request->get('info');
        if($requestData['data'] != null)
        {
            $user = User::find($requestData['id']);
            if($requestData['filedName'] == 'email'){
                $user->email = $requestData['data'];
            }else{
                if($user->name != null){
                    $userName = explode(' ',$user->name);
                }else{
                    $userName = ['', ''];
                }
                if(count($userName) == 1) array_push($userName, '');
                if($requestData['filedName'] == 'firstname') $userName[0] = $requestData['data'];
                if($requestData['filedName'] == 'secondname') $userName[1] = $requestData['data'];
                $newName = implode(' ', $userName);
                $user->name = $newName;
            }
            $user->save();
        }
    }
}
