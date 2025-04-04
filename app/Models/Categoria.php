<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'descricao', // Permite que o campo 'descricao' seja preenchido via métodos como create() e update().
    ];

    /**
     * Define a relação "um para muitos" com o modelo Atividade.
     *
     * Uma categoria pode ter várias atividades associadas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function atividades()
    {
        return $this->hasMany(Atividade::class);
    }

    /**
     * Escopo de consulta para buscar categorias por descrição.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $descricao
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePorDescricao($query, $descricao)
    {
        return $query->where('descricao', 'like', "%{$descricao}%");
    }
}