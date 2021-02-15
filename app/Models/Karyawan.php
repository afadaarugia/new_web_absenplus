<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Karyawan
 * @package App\Models
 * @version February 14, 2021, 11:11 am UTC
 *
 * @property \App\Models\Kota $kotas
 * @property \App\Models\NamePosition $namePositions
 * @property \App\Models\Sektor $sektors
 * @property \App\Models\User $users
 * @property \Illuminate\Database\Eloquent\Collection $absensis
 * @property string $foto
 * @property string $nama
 * @property string $alamat
 * @property string $jenis_kelamin
 * @property integer $name_positions_id
 * @property integer $sektors_id
 * @property integer $kotas_id
 * @property integer $users_id
 */
class Karyawan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'karyawans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'foto' => 'string',
        'nama' => 'string',
        'alamat' => 'string',
        'jenis_kelamin' => 'string',
        'name_positions_id' => 'integer',
        'sektors_id' => 'integer',
        'kotas_id' => 'integer',
        'users_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'foto' => 'nullable|mimetypes:image/jpeg, image/jpg, image/png|max:255',
        'nama' => 'nullable|string|max:45',
        'alamat' => 'nullable|string',
        'jenis_kelamin' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'name_positions_id' => 'required|integer',
        'sektors_id' => 'required|integer',
        'kotas_id' => 'required|integer',
        'users_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function kotas()
    {
        return $this->belongsTo(\App\Models\Kota::class, 'kotas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function namePositions()
    {
        return $this->belongsTo(\App\Models\NamePosition::class, 'name_positions_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function sektors()
    {
        return $this->belongsTo(\App\Models\Sektor::class, 'sektors_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class, 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function absensis()
    {
        return $this->hasMany(\App\Models\Absensi::class, 'karyawans_id');
    }
}
