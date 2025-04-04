<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'data_atividade',
        'hora_inicio',
        'hora_fim',
        'descricao',
        'categoria_id',
        'usuario_id',
        'departamento_id',
        'status',
        'observacao',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'data_atividade' => 'date', // Converte para Carbon
    ];

    /**
     * Define a relação "pertence a" com o modelo Categoria.
     *
     * Uma atividade pertence a uma categoria.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Define a relação "pertence a" com o modelo Usuario.
     *
     * Uma atividade pertence a um usuário.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    /**
     * Define a relação "pertence a" com o modelo Departamento.
     *
     * Uma atividade pertence a um departamento.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    /**
     * Escopo de consulta para buscar atividades por descrição.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $descricao
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePorDescricao($query, $descricao)
    {
        return $query->where('descricao', 'like', "%{$descricao}%");
    }

    /**
     * Escopo de consulta para buscar atividades por status.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePorStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Escopo de consulta para buscar atividades por data.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $data
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePorData($query, $data)
    {
        return $query->where('data_atividade', $data);
    }
}