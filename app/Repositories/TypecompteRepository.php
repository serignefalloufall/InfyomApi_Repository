<?php

namespace App\Repositories;

use App\Models\Typecompte;
use App\Repositories\BaseRepository;

/**
 * Class TypecompteRepository
 * @package App\Repositories
 * @version September 22, 2020, 4:24 pm UTC
*/

class TypecompteRepository extends BaseRepository
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
        return Typecompte::class;
    }
}
