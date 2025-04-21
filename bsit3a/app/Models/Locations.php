<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;
    protected $table = "locations";
    protected $fillable =["name","country_id"];

    public function employeeLocations(){
        return $this->hasMany(Employments::class);
    }

    public function country(){
        return $this->belongsTo(Country::class,"country_id");
    }
}
