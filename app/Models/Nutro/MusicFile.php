<?php

namespace App\Models\Nutro;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'ru_name',
        'en_name',
        'file_path'
    ];

    public $timestamps = true;
}
