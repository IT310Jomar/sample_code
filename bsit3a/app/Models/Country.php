<?php

namespace App\Models;

use App\Models\Locations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $table = "country";
    protected $fillable = ["name"];

    public function countryLocation(){
        return $this->hasMany(Locations::class);
    }
}
