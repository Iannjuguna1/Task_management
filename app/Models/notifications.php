<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_id',
        'message',
        'sent_at',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(users::class);
    }

    public function task()
    {
        return $this->belongsTo(tasks::class);
    }
}
