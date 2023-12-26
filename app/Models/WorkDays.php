<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkDays extends Model
{
    use HasFactory;

    protected $table = 'work_days';

    protected $fillable = [
        'officer_id',
        'dayofweek'
    ];
}
