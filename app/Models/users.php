<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public $timestamps = false; // Only created_at is present

    public function tasks()
    {
        return $this->hasMany(tasks::class, 'user_id');
    }

    public function createdTasks()
    {
        return $this->hasMany(tasks::class, 'created_by');
    }

    public function notifications()
    {
        return $this->hasMany(notifications::class);
    }

    public function taskHistories()
    {
        return $this->hasMany(task_history::class);
    }
}
