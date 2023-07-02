<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registry extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','registry_number', 'birth_date', 'nisn',
    'birth_place', 'email', 'phone', 'religion', 'sibling', 'user_id',
    'sex', 'previous_school', 'status', 'notes'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function attachment() {
        return $this->hasMany(Attachment::class);
    }
    public function family() {
        return $this->hasMany(Family::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
