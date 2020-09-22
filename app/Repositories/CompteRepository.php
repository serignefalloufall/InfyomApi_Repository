<?php

namespace App\Repositories;

use App\Models\Compte;
use App\Repositories\BaseRepository;

/**
 * Class CompteRepository
 * @package App\Repositories
 * @version September 22, 2020, 4:26 pm UTC
*/

class CompteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Compte::class;
    }
}
