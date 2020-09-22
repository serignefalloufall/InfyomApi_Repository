<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\BaseRepository;

/**
 * Class ClientRepository
 * @package App\Repositories
 * @version September 22, 2020, 3:58 pm UTC
*/

class ClientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Client::class;
    }
}
