<?php

namespace App\Repositories;

use App\Models\Typeoperation;
use App\Repositories\BaseRepository;

/**
 * Class TypeoperationRepository
 * @package App\Repositories
 * @version September 22, 2020, 2:05 pm UTC
*/

class TypeoperationRepository extends BaseRepository
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
        return Typeoperation::class;
    }
}
