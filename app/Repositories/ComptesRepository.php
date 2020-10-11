<?php

namespace App\Repositories;

use App\Models\Comptes;
use App\Repositories\BaseRepository;

/**
 * Class ComptesRepository
 * @package App\Repositories
 * @version October 11, 2020, 2:48 pm UTC
*/

class ComptesRepository extends BaseRepository
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
        return Comptes::class;
    }
}
