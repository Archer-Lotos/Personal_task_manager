<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];
    protected $dates = ['created_at'];

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
