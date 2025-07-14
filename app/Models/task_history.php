<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task_history extends Model
{
    use HasFactory;

    protected $table = 'task_history';

    protected $fillable = [
        'task_id',
        'user_id',
        'action',
    ];

    // Uses default timestamps (created_at, updated_at)

    public function task()
    {
        return $this->belongsTo(tasks::class);
    }

    public function user()
    {
        return $this->belongsTo(users::class);
    }
}
