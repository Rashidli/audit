<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanQuestion extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function planOrders()
    {
        return $this->belongsToMany(PlanOrder::class)->withPivot('answer', 'comment');
    }
}
