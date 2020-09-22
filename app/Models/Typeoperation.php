<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Typeoperation
 * @package App\Models
 * @version September 22, 2020, 2:05 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $operations
 * @property string $libelle
 */
class Typeoperation extends Model
{
    use SoftDeletes;

    public $table = 'typeoperations';
    
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
    public function operations()
    {
        return $this->hasMany(\App\Models\Operation::class, 'typeoperations_id');
    }
}
