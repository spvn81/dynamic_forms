<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    public function fields() {
        return $this->hasMany(FormField::class);
    }

    public function responses() {
        return $this->hasMany(Response::class);
    }

}
