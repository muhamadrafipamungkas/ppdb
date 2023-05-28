<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{

    use SoftDeletes;

    protected $fillable = ['filename', 'registry_id', 'attachment_type'];

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
