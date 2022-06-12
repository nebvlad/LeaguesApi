<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leagues extends Model
{
    protected $fillable = ['league_id', 'name', 'tier', 'region', 'most_recent_activity', 'total_prize_pool', 'start_timestamp', 'end_timestamp', 'status'];
    public $timestamps = false;
}
