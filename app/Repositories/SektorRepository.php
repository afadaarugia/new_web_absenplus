<?php

namespace App\Repositories;

use App\Models\Sektor;
use App\Repositories\BaseRepository;

/**
 * Class SektorRepository
 * @package App\Repositories
 * @version February 14, 2021, 11:07 am UTC
*/

class SektorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'longitude',
        'latitude'
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
        return Sektor::class;
    }
}
