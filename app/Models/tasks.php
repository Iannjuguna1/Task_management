<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'status',
        'deadline',
        'created_by',
    ];

    public $timestamps = false; // Only created_at is present

    public function user()
    {
        return $this->belongsTo(related: users::class, foreignKey: 'user_id');
    }

    public function creator()
    {
        return $this->belongsTo(related: users::class, foreignKey: 'created_by');
    }

    public function notifications()
    {
        return $this->hasMany(notifications::class);
    }

    public function histories()
    {
        return $this->hasMany(task_history::class);
    }
}
