<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];


    public function competitions()
    {
        return $this->hasMany('App\Competition');
    }
}
