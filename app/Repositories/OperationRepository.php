<?php

namespace App\Repositories;

use App\Models\Operation;
use App\Repositories\BaseRepository;

/**
 * Class OperationRepository
 * @package App\Repositories
 * @version September 22, 2020, 1:53 pm UTC
*/

class OperationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'typeoperations_id',
        'comptes_id',
        'montant',
        'dateoperation'
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
        return Operation::class;
    }
}
