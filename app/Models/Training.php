<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $table = 'training_sessions';
    protected $fillable = [
        'title', 'description', 'category', 'start_date', 'end_date', 'fee',
    ];
}
