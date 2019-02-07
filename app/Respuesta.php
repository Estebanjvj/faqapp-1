<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $fillable = [
        'id', 'respuesta', 'pregunta_id', 'fuentes'
    ];

    /**
     * una seccion tiene muchas preguntas
     * una pregunta pertenece a una seccion
     *
     * @return void
     */
    public function pregunta()
    {
        return $this->BelongsTo('\App\Pregunta');
    }

    public function pasos()
    {
        return $this->hasMany('\App\Paso');
    }

    // delete all relationships
    public static function boot() {
        parent::boot();

        static::deleting(function($res) { // before delete() method call this
             $res->pasos()->delete();
             // do the rest of the cleanup...
        });
    }
}
