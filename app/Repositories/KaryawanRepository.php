<?php

namespace App\Repositories;

use App\Models\Karyawan;
use App\Repositories\BaseRepository;

/**
 * Class KaryawanRepository
 * @package App\Repositories
 * @version February 14, 2021, 11:11 am UTC
*/

class KaryawanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'foto',
        'nama',
        'alamat',
        'jenis_kelamin',
        'name_positions_id',
        'sektors_id',
        'kotas_id',
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
        return Karyawan::class;
    }
}
