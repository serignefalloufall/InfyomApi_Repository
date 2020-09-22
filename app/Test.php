<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = array('nom');
    //pour donner les attribut de nos table
    public static $rules = array('nom'=>'required|min:2');  
    //definir les contrainte
}
