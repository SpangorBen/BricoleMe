<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
     
    ];




    public function competance() {
        return $this->hasMany(Competance::class);
    }

    public function artisan() {
<<<<<<< HEAD
        return $this->belonsToMany(Artisan::class);
=======
        return $this->belongsToMany(Artisan::class);
>>>>>>> origin/master
    }
}