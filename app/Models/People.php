<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class People
 *
 * @property $id
 * @property $name
 * @property $lastname
 * @property $email
 * @property $province
 * @property $zip_code
 * @property $direction
 * @property $sex
 * @property $age
 * @property $dni
 * @property $date_birth
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class People extends Model
{

    static $rules = [
        'name' => 'required',
        'lastname' => 'required',
        'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'lastname', 'email', 'province', 'zip_code', 'direction', 'sex', 'age', 'dni', 'date_birth'];

}
