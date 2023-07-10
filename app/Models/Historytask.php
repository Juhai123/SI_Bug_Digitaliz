<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Historytask extends Model
{
    use HasFactory, Notifiable;
    protected $fillable=['bug_id', 'task_id', 'user_id', 'status', 'information'];

    public function bug(){
        return $this->belongsTo(Bug::class, 'bug_id', 'id');
    }
    public function task(){
        return $this->belongsTo(Task::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
