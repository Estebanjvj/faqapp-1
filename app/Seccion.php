<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $fillable = [
        'id', 'name', 'icon', 'description'
    ];

    /**
     * una seccion tiene muchas preguntas
     * una pregunta pertenece a una seccion
     *
     * @return void
     */
    public function preguntas()
    {
        return $this->hasMany('\App\Pregunta');
    }

    // delete all relationships
    public static function boot() {
        parent::boot();

        static::deleting(function($res) { // before delete() method call this
            $res->preguntas->each(function($pregunta) {
                $pregunta->delete();
            });
             //$res->preguntas()->delete();
             // do the rest of the cleanup...
        });
    }
}
