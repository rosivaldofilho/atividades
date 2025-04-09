<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome', // Permite que o campo 'nome' seja preenchido via métodos como create() e update().
        'departamento_id', // Permite que o campo 'departamento_id' seja preenchido via métodos como create() e update().
    ];

    /**
     * Define a relação "pertence a" com o modelo Departamento.
     *
     * Um usuário pertence a um departamento.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    /**
     * Define a relação "um para muitos" com o modelo Atividade.
     *
     * Um usuário pode ter várias atividades associadas.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function atividades()
    {
        return $this->hasMany(Atividade::class);
    }

    /**
     * Escopo de consulta para buscar usuários por nome.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $nome
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePorNome($query, $nome)
    {
        if (!empty($nome)) {
            return $query->where('nome', 'like', "%{$nome}%");
        }
        return $query;
    }
}