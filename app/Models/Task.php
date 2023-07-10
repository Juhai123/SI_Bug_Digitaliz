<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    use HasFactory, Notifiable;
    protected $fillable=['bug_id','user_id', 'start', 'end', 'information'];

    public function bug(){
        return $this->belongsTo(Bug::class, 'bug_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function historytask(){
        return $this->hasMany(Historytask::class);
    }
}
