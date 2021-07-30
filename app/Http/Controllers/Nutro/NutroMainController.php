<?php

namespace App\Http\Controllers\Nutro;

use App\Http\Controllers\Controller;
use App\Models\Nutro\DayInRow;
use App\Models\Nutro\NutroQuotes;
use App\Models\Nutro\Statistic;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class NutroMainController extends Controller
{

    public function settings(): Response
    {
        return response()->view('nutro.settings');
    }

    public function about(): Response
    {
        return response()->view('nutro.about');
    }

    public function signin(): Response
    {
        return response()->view('auth.signin');
    }

    public function signup(): Response
    {
        return response()->view('auth.signup');
    }

    public function forgotPassword(): Response
    {
        return response()->view('auth.forgot_password');
    }

    public function profile(): Response
    {
        $access = Auth::user()->provider_id == null;
        $uid = Auth::user()->id;
        $userNameData = Auth::user()->name;
        if($userNameData != null){
            $userName = explode(' ', $userNameData);
        }else{
            $userName = ['', ''];
        }
        $email = Auth::user()->email;
        return response()->view('nutro.profile', compact('userName', 'email', 'access', 'uid'));
    }

    public function statistic(): Response
    {
        $uid = Auth::user()->id;
        $daysData = DayInRow::where('user_id', '=', $uid)->first();
        $days = $daysData != null ? $daysData->count : 0;
        $count = Statistic::where('user_id', '=', $uid)->sum('count_of_meditation');
        $timeData =  Statistic::where('user_id', '=', $uid)->get('time_of_meditation');
        if($timeData->count() > 0)
        {
            $minutes = 0;
            $seconds = 0;
            foreach ($timeData as $item)
            {
                $tmp = explode('.', $item->time_of_meditation);
                $minutes += intval($tmp[0]);
                $seconds += intval($tmp[1]);
            }
            if($seconds == 60)
            {
                $minutes++;
            }elseif($seconds > 60) {
                $tmp_sec = $seconds%60;
                $tmp_min = $seconds/60;
                $minutes += $tmp_min;
                if($tmp_sec >= 30){
                    $minutes += 1;
                }
            }
            $time = $minutes;
        }else{
            $time = 0;
        }
        return response()->view('nutro.statistic', compact('days', 'count', 'time', 'uid'));
    }

    public function result(Request $request)
    {
        if($request->session()->previousUrl() == url()->full())
        {
            return redirect('/');
        }
        $tmpTime = intval(explode('.', $request->get('time'))[0]);
        $text = NutroQuotes::where('locale', '=', 'ru')->orderByRaw("RAND()")->first(['quote']);
        if(Auth::check())
        {
            $result = Statistic::timeControl($request->get('time'));
            $time = $result[0] != '' ? $result[0] : $tmpTime;
            $count = $result[1] != '' ? $result[1] : 1;
            return response()->view('nutro.result', compact('time', 'text', 'count'));
        }else{
            $time = $tmpTime;
            return response()->view('nutro.result', compact('time', 'text'));
        }
    }
}
