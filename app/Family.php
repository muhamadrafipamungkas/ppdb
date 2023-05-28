<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{

    use SoftDeletes;

    protected $fillable = ['name', 'birth_date',
        'birth_place', 'email', 'phone', 'religion', 'sex',
        'relation_type' ,'registry_id'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function registry()
    {
        return $this->belongsTo(Registry::class);
    }
}
