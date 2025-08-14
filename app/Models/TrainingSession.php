<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    protected $fillable = [
    'title',
    'description',
    'category',
    'start_date',
    'end_date',
    'fee',
];

    public function applications()
    {
        return $this->hasMany(TrainingApplication::class);
    }

}
