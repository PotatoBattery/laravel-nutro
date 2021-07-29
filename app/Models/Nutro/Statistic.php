<?php

namespace App\Models\Nutro;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed date_time_value
 * @property mixed count_of_meditation
 * @property mixed time_of_meditation
 * @property false|mixed|string day
 * @method static where(string $string, string $string1, false|string $yesterday)
 */
class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_time_value',
        'count_of_meditation',
        'time_of_meditation',
        'day',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    static function timeControl($requestTime): array
    {
        $uid = Auth::user()->id;
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime("-1 days"));
        $statistic = Statistic::where('day', '=', $today)->where('user_id', '=', $uid)->first();
            if($statistic != null)
            {
                $count = $statistic->count_of_meditation + 1;
                $baseTime = explode('.', $statistic->time_of_meditation);
                $tmpCurrentTime = explode('.', $requestTime);
                $minutes = intval($baseTime[0])+intval($tmpCurrentTime[0]);
                $seconds = intval($baseTime[1])+intval($tmpCurrentTime[1]);
                if($seconds >= 60)
                {
                    $minutes = $minutes + 1;
                    $new_seconds = $seconds - 60;
                    $timeForBase = $minutes.'.'.$new_seconds;
                }else{
                    $timeForBase = $minutes.'.'.$seconds;
                }
                $time = $minutes;
                Statistic::checkDate($today, $yesterday, $uid, $statistic->date_time_value);
                $statistic->count_of_meditation = $statistic->count_of_meditation + 1;
                $statistic->time_of_meditation = $timeForBase;
                $statistic->save();
            }else{
                $tmpCurrentTime = explode('.', $requestTime);
                $minutes = intval($tmpCurrentTime[0]);
                $seconds = intval($tmpCurrentTime[1]);
                $baseTime = $minutes.'.'.$seconds;
                $time = $minutes;
                $count = 1;
                $newData = new Statistic;
                $newData->user()->associate($uid);
                $newData->date_time_value = time();
                $newData->count_of_meditation = $count;
                $newData->time_of_meditation = $baseTime;
                $newData->day = $today;
                $newData->save();
                Statistic::checkDate($today, $yesterday, $uid, time());
            }
            return [$time, $count];
    }

    static function checkDate($today, $yesterday, $uid, $time)
    {
        $yesterdayData = Statistic::where('day', '=', $yesterday)->where('user_id', '=', $uid)->first('date_time_value');
        if($yesterdayData != null){
            $flag = (intval($time) - intval($yesterdayData->date_time_value))/(60*60);
            if($flag > 24)
            {
                if(DayInRow::where('user_id', '=',$uid)->count() > 0)
                {
                    DayInRow::refreshData($today, $uid);
                }else{
                    DayInRow::addNew($today, $uid);
                }
            }else{
                $updateDateData = DayInRow::where('user_id', '=', $uid)->first();
                if($updateDateData->count() > 0)
                {
                    if($updateDateData->update_date != $today)
                    {
                        $updateDateData->update_date = $today;
                        $updateDateData->count = $updateDateData->count + 1;
                        $updateDateData->save();
                    }
                }else{
                    DayInRow::addNew($today, $uid);
                }
            }
        }else{
            $yesterdayNewData = new Statistic;
            $yesterdayNewData->user()->associate($uid);
            $yesterdayNewData->date_time_value = (time() - 86400);
            $yesterdayNewData->count_of_meditation = 0;
            $yesterdayNewData->time_of_meditation = '0.0';
            $yesterdayNewData->day = $yesterday;
            $yesterdayNewData->save();
            if(DayInRow::where('user_id', '=',$uid)->count() > 0)
            {
                DayInRow::refreshData($today, $uid);
            }else{
                DayInRow::addNew($today, $uid);
            }
        }
    }
}
