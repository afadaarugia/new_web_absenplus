<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Absensi
 * @package App\Models
 * @version February 15, 2021, 12:22 pm UTC
 *
 * @property \App\Models\Karyawan $karyawans
 * @property string|\Carbon\Carbon $time_in
 * @property string|\Carbon\Carbon $time_out
 * @property number $longitude
 * @property number $latitude
 * @property string $keterangan
 * @property integer $karyawans_id
 */
class Absensi extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'absensis';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'time_in',
        'time_out',
        'longitude',
        'latitude',
        'keterangan',
        'karyawans_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'time_in' => 'datetime',
        'time_out' => 'datetime',
        'longitude' => 'float',
        'latitude' => 'float',
        'keterangan' => 'string',
        'karyawans_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'time_in' => 'nullable',
        'time_out' => 'nullable',
        'longitude' => 'nullable|numeric',
        'latitude' => 'nullable|numeric',
        'keterangan' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'karyawans_id' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function karyawans()
    {
        return $this->belongsTo(\App\Models\Karyawan::class, 'karyawans_id');
    }
}
