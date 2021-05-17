<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    protected $table = 'details_plan';

    public function plan()
    {
            return $this->belongsTo(Plan::class);
    }
}
