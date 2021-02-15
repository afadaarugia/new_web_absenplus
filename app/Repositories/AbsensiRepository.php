<?php

namespace App\Repositories;

use App\Models\Absensi;
use App\Repositories\BaseRepository;

/**
 * Class AbsensiRepository
 * @package App\Repositories
 * @version February 15, 2021, 12:22 pm UTC
*/

class AbsensiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'time_in',
        'time_out',
        'longitude',
        'latitude',
        'keterangan',
        'karyawans_id'
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
        return Absensi::class;
    }
}
