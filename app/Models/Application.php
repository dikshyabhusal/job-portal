<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';

    protected $fillable = [
        'job_id', 'name', 'email', 'phone', 'cover_letter', 'cv', 'years_of_experience'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    
}
