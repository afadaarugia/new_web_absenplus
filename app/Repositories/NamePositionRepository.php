<?php

namespace App\Repositories;

use App\Models\NamePosition;
use App\Repositories\BaseRepository;

/**
 * Class NamePositionRepository
 * @package App\Repositories
 * @version February 14, 2021, 1:09 pm UTC
*/

class NamePositionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'levels_id'
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
        return NamePosition::class;
    }
}
