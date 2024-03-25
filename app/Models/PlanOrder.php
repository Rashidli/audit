<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanOrder extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function planQuestions()
    {
        return $this->belongsToMany(PlanQuestion::class)->withPivot('answer', 'comment');
    }
}
