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
        'nome', // Permite que o campo 'nome' seja preenchido via métodos como create() e update().
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
     * @param  string  $nome
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePorNome($query, $nome)
    {
        return $query->where('nome', 'like', "%{$nome}%");
    }
}