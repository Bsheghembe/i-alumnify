<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class articles extends Model
{
    //
    protected $fillable =[
        'title',
        'body',
        'published_at',
        'user_id'
        
    ];
    
    protected $dates =['published_at'];
 public function scopePublished($query)
 {
     $query ->where('published_at','<=',Carbon::now());
     
     
 }
 
 public function scopeUnpublished($query)
 {
     
     $query->where('published_at','>',Carbon::now());
     
 }
    //NOTICE THE CONVENTION SET, NAME OF THE VALUE IN CAMEL CASE, ATTRIBUTE
    public function setPublishedAtAttribute($date)
            {
        $this->attributes['published_at']= Carbon::parse($date);
        
      /**
       * 
       * An article belongs to only one user
       * 
       * @return type belogns to User
       */  
        
    }
    public function user()
            {
        
        return $this->belongsTo('App\User');
       
    }
    
}
