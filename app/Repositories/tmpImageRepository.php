<?php

namespace App\Repositories;

use App\Models\tmpImage;
use App\Repositories\BaseRepository;

/**
 * Class tmpImageRepository
 * @package App\Repositories
 * @version February 14, 2021, 11:09 am UTC
*/

class tmpImageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
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
        return tmpImage::class;
    }
}
