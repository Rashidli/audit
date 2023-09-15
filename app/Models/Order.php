<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{

    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function masters()
    {
        return $this->belongsToMany(Master::class);
    }

    public function workers()
    {
        return $this->belongsToMany(Worker::class);
    }

}
