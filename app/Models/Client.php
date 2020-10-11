<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @package App\Models
 * @version October 11, 2020, 1:51 pm UTC
 *
 * @property string $matricule
 * @property string $cni
 * @property string $prenom
 * @property string $nom
 * @property string $datenaiss
 * @property string $adresse
 * @property string $email
 */
class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'matricule',
        'cni',
        'prenom',
        'nom',
        'datenaiss',
        'adresse',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'matricule' => 'string',
        'cni' => 'string',
        'prenom' => 'string',
        'nom' => 'string',
        'datenaiss' => 'string',
        'adresse' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'matricule' => 'requred|max:8',
        'cni' => 'required|max:13',
        'prenom' => 'required|max:20',
        'nom' => 'required|max:10',
        'datenaiss' => 'required',
        'adresse' => 'required|max:20'
    ];

    
}
