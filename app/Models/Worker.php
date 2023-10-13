<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{

    use HasFactory, SoftDeletes;

    protected  $fillable = ['number', 'fin_code', 'title', 'position', 'department'];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }

}
