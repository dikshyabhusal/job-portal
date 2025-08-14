<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingApplication extends Model
{
    protected $fillable = [
    'user_id',
    'training_session_id',
    'name',
    'phone',
    'address',
    'time_slot',
    'status',
];

    public function session()
    {
        return $this->belongsTo(TrainingSession::class, 'training_session_id');
    }

}
