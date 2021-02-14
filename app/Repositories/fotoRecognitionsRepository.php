<?php

namespace App\Repositories;

use App\Models\fotoRecognitions;
use App\Repositories\BaseRepository;

/**
 * Class fotoRecognitionsRepository
 * @package App\Repositories
 * @version February 14, 2021, 11:10 am UTC
*/

class fotoRecognitionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'foto',
        'users_id'
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
        return fotoRecognitions::class;
    }
}
