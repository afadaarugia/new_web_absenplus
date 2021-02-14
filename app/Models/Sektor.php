<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Sektor
 * @package App\Models
 * @version February 14, 2021, 11:07 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $karyawans
 * @property string $nama
 * @property number $longitude
 * @property number $latitude
 */
class Sektor extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'sektors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'longitude',
        'latitude'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'longitude' => 'float',
        'latitude' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'nullable|string|max:45',
        'longitude' => 'nullable|numeric',
        'latitude' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function karyawans()
    {
        return $this->hasMany(\App\Models\Karyawan::class, 'sektors_id');
    }
}
