<?php

namespace App\Models\Booking;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use Sluggable;


    protected $fillable = [
        'fullname',
        'email' , 
        'subject',  
        'message',
}

