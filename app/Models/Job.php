<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = 'job';
    // Define the fillable fields or the protected properties as necessary
    protected $fillable = ['title', 'description', 'location', 'salary', 'company','user_id','requirements','skills', 'experience_required'];
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function category()
{
    return $this->belongsTo(Category::class);
}

    
}
