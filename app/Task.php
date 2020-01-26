<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
     public $fillable = ['id','project_id','user_id','name', 'status' , 'due_date']; 

     public function project()
    {
        return $this->belongsTo(Project::class);
    }
     
    

	 public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function setDueDateAttribute($date){

    $this->attributes['due_date'] = Carbon::parse($date);

}
    public function getDueDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

}
