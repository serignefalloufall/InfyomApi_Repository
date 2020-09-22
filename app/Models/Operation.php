<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operation
 * @package App\Models
 * @version September 22, 2020, 1:53 pm UTC
 *
 * @property \App\Models\Compte $comptes
 * @property \App\Models\Typeoperation $typeoperations
 * @property integer $typeoperations_id
 * @property integer $comptes_id
 * @property number $montant
 * @property string $dateoperation
 */
class Operation extends Model
{
    use SoftDeletes;

    public $table = 'operations';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'typeoperations_id',
        'comptes_id',
        'montant',
        'dateoperation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'typeoperations_id' => 'integer',
        'comptes_id' => 'integer',
        'montant' => 'decimal:2',
        'dateoperation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'typeoperations_id' => 'required|integer',
        'comptes_id' => 'required|integer',
        'montant' => 'required|numeric',
        'dateoperation' => 'required|string|max:255',
        'deleted_at' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function comptes()
    {
        return $this->belongsTo(\App\Models\Compte::class, 'comptes_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeoperations()
    {
        return $this->belongsTo(\App\Models\Typeoperation::class, 'typeoperations_id');
    }
}
