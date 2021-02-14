<?php

namespace App\Repositories;

use App\Models\Kota;
use App\Repositories\BaseRepository;

/**
 * Class KotaRepository
 * @package App\Repositories
 * @version February 3, 2021, 11:19 am UTC
*/

class KotaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
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
        return Kota::class;
    }
}
