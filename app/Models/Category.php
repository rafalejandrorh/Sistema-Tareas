<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tareas;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'color'];
    
    public function tareas(){
        return $this->hasMany(tareas::class);
    }
}
