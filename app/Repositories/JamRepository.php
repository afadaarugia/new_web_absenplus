<?php

namespace App\Repositories;

use App\Models\Jam;
use App\Repositories\BaseRepository;

/**
 * Class JamRepository
 * @package App\Repositories
 * @version February 14, 2021, 11:04 am UTC
*/

class JamRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'masuk',
        'pulang',
        'keterangan'
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
        return Jam::class;
    }
}
