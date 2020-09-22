<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package App\Models
 * @version September 22, 2020, 3:58 pm UTC
 *
 * @property \App\Models\Typeclient $typeclients
 * @property \Illuminate\Database\Eloquent\Collection $comptes
 * @property integer $typeclients_id
 * @property string $nom
 * @property string $prenom
 * @property string $adresse
 * @property string $tel
 * @property string $email
 * @property string $profession
 * @property number $salaire
 * @property string $cni
 */
class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'typeclients_id',
        'nom',
        'prenom',
        'adresse',
        'tel',
        'email',
        'profession',
        'salaire',
        'cni'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'typeclients_id' => 'integer',
        'nom' => 'string',
        'prenom' => 'string',
        'adresse' => 'string',
        'tel' => 'string',
        'email' => 'string',
        'profession' => 'string',
        'salaire' => 'decimal:2',
        'cni' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'typeclients_id' => 'nullable|integer',
        'nom' => 'nullable|string|max:255',
        'prenom' => 'nullable|string|max:255',
        'adresse' => 'nullable|string|max:255',
        'tel' => 'nullable|string|max:255',
        'email' => 'nullable|string|max:255',
        'profession' => 'nullable|string|max:255',
        'salaire' => 'nullable|numeric',
        'cni' => 'nullable|string|max:255',
        'deleted_at' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeclients()
    {
        return $this->belongsTo(\App\Models\Typeclient::class, 'typeclients_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function comptes()
    {
        return $this->hasMany(\App\Models\Compte::class, 'clients_id');
    }
}
