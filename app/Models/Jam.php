<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Jam
 * @package App\Models
 * @version February 14, 2021, 11:04 am UTC
 *
 * @property string|\Carbon\Carbon $masuk
 * @property string|\Carbon\Carbon $pulang
 * @property string $keterangan
 */
class Jam extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jams';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'masuk',
        'pulang',
        'keterangan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'masuk' => 'datetime',
        'pulang' => 'datetime',
        'keterangan' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'masuk' => 'nullable',
        'pulang' => 'nullable',
        'keterangan' => 'nullable|string|max:45',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
