<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable=['id','project_name','instansi_id', 'link', 'user_id'];

    public function instansi(){
        return $this->belongsTo(Instansi::class);
    }

    public function bug()
    {
        return $this->hasMany(Bug::class, 'bug_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project_user()
    {
        return $this->hasMany(Project_user::class, 'project_id', 'id');
    }

}
