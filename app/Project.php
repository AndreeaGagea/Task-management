<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Project extends Model
{
    public $fillable = ['id','name','user_id','description','created_at','status','duedate'];

    

    public static function getProjectsByUser($user)
    {
        $projects =  Project::all();
        return $projects;
    }

    public function setDueDateAttribute($date){

    $this->attributes['duedate'] = Carbon::parse($date);

}
    public function getDueDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this-hasMany(User::class);
    }



}
