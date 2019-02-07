<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $fillable = [
        'id', 'pregunta', 'seccion_id'
    ];

    /**
     * una seccion tiene muchas preguntas
     * una pregunta pertenece a una seccion
     *
     * @return void
     */
    public function seccion()
    {
        return $this->BelongsTo('\App\Seccion');
    }

    /**
     * una seccion tiene muchas respuestas
     * una respuesta pertenece a una pregunta
     *
     * @return void
     */
    public function respuestas()
    {
        return $this->hasMany('\App\Respuesta');
    }

    // delete all relationships
    public static function boot() {
        parent::boot();

        static::deleting(function($res) { // before delete() method call this
            $res->respuestas->each(function($respuesta) {
                $respuesta->delete();
            });
             //$res->respuestas()->delete();
             // do the rest of the cleanup...
        });
    }
}
