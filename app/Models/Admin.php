<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use HasFactory;
    use Notifiable;
    protected $table="admin";
    public $timestamps=false;
    protected $primarykey  ="a_id";
    protected $fillable = ['a_name', 'a_password']; // Allow mass-assignment for these fields
    protected $hidden = ['a_password']; // Hide the password when returning the model

    // protected function setPasswordAttribute($value){
    //     $this->attributes['a_password']= Hash :: make($value);
    // }
}
