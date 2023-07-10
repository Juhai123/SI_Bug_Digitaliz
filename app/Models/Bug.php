<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bug extends Model
{
    use HasFactory, Notifiable;

    protected $fillable=['name','project_id', 'user_id', 'description', 'file', 'status','priority', 'progress'];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function task(){
        return $this->hasMany(Task::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function historytask(){
        return $this->hasMany(Historytask::class);
    }
}
