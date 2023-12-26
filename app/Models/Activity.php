<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

     protected $fillable = [
        'aname',
        'atype',
        'astatus',
        'adate',
        'startTime',
        'endTime',
        'addedOn',
        'officer_id',
        'visitor_id'
     ];
}
