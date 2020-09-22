<?php

namespace App\Repositories;

use App\Models\Typeclient;
use App\Repositories\BaseRepository;

/**
 * Class TypeclientRepository
 * @package App\Repositories
 * @version September 22, 2020, 3:59 pm UTC
*/

class TypeclientRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'libelle'
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
        return Typeclient::class;
    }
}
