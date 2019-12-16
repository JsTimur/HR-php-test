<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function listing() {
        return $this->orderBy('name');
    }

    public function vendor() {
        return $this->belongsTo(Vendor::class);
    }
}
