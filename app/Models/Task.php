<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // use HasFactory;
 
    // //primary key
    // public $primaryKey = 'id';
    // //Timestamps
    // public $timestamps = true;

    protected $fillable =[
        'taskTitle',
        'description',
        'date'
    ];
}
