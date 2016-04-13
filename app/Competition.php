<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'competitions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'sport_id'];

    public function games()
    {
        return $this->hasMany('App\Game');
    }

}
