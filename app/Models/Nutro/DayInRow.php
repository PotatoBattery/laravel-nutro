<?php

namespace App\Models\Nutro;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, string $string1, $uid)
 * @property false|mixed|string update_date
 * @property int|mixed count
 */
class DayInRow extends Model
{
    use HasFactory;

    protected $fillable = [
        'update_date',
        'count',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    static function addNew($day, $uid)
    {
        $dayInRow = new DayInRow;
        $dayInRow->count = 1;
        $dayInRow->update_date = $day;
        $dayInRow->user()->associate($uid);
        $dayInRow->save();
    }

    static function refreshData($day, $uid)
    {
        $dayInRow = DayInRow::where('user_id', '=', $uid)->first();
        $dayInRow->count = 1;
        $dayInRow->update_date = $day;
        $dayInRow->save();
    }
}
