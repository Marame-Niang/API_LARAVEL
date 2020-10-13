<?php

namespace App\Repositories;

use App\Models\TypeCompte;
use App\Repositories\BaseRepository;

/**
 * Class TypeCompteRepository
 * @package App\Repositories
 * @version October 11, 2020, 3:14 pm UTC
*/

class TypeCompteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return TypeCompte::class;
    }
}
