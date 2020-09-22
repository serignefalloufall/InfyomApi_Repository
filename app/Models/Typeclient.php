<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Typeclient
 * @package App\Models
 * @version September 22, 2020, 3:59 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $clients
 * @property string $libelle
 */
class Typeclient extends Model
{
    use SoftDeletes;

    public $table = 'typeclients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'libelle'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'libelle' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'libelle' => 'required|string|max:255',
        'deleted_at' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function clients()
    {
        return $this->hasMany(\App\Models\Client::class, 'typeclients_id');
    }
}
