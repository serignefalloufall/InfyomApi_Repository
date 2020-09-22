<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Compte
 * @package App\Models
 * @version September 22, 2020, 4:26 pm UTC
 *
 * @property \App\Models\Client $clients
 * @property \App\Models\Typecompte $typecomptes
 * @property \Illuminate\Database\Eloquent\Collection $operations
 * @property integer $clients_id
 * @property integer $typecomptes_id
 * @property string $num_compte
 * @property string $cle_rip
 * @property number $frais_ouverture
 * @property number $agio
 * @property string $date_ouverture
 * @property string $date_fermuture
 */
class Compte extends Model
{
    use SoftDeletes;

    public $table = 'comptes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'clients_id',
        'typecomptes_id',
        'num_compte',
        'cle_rip',
        'frais_ouverture',
        'agio',
        'date_ouverture',
        'date_fermuture'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'clients_id' => 'integer',
        'typecomptes_id' => 'integer',
        'num_compte' => 'string',
        'cle_rip' => 'string',
        'frais_ouverture' => 'decimal:2',
        'agio' => 'float',
        'date_ouverture' => 'string',
        'date_fermuture' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'clients_id' => 'nullable|integer',
        'typecomptes_id' => 'nullable|integer',
        'num_compte' => 'nullable|string|max:255',
        'cle_rip' => 'nullable|string|max:255',
        'frais_ouverture' => 'nullable|numeric',
        'agio' => 'nullable|numeric',
        'date_ouverture' => 'nullable|string|max:255',
        'date_fermuture' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function clients()
    {
        return $this->belongsTo(\App\Models\Client::class, 'clients_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typecomptes()
    {
        return $this->belongsTo(\App\Models\Typecompte::class, 'typecomptes_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function operations()
    {
        return $this->hasMany(\App\Models\Operation::class, 'comptes_id');
    }
}
