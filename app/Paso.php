<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paso extends Model
{
    protected $fillable = [
        'id', 'paso', 'pregunta_id', 'image'
    ];

    /**
     * una seccion tiene muchas preguntas
     * una pregunta pertenece a una seccion
     *
     * @return void
     */
    public function respuesta()
    {
        return $this->BelongsTo('\App\Respuesta');
    }
}
