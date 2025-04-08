<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa o trait HasFactory para suporte a factories
use Illuminate\Database\Eloquent\Model; // Importa a classe base Model do Eloquent

class Departamento extends Model
{
    use HasFactory; // Usa o trait HasFactory para facilitar a criação de registros usando factories

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'nome', // Define que o campo 'nome' pode ser preenchido em massa (usado em create/update)
    ];

    /**
     * Os atributos que devem ser ocultados ao serializar o modelo.
     *
     * @var array
     */
    protected $hidden = [
        // Aqui você pode adicionar campos que não devem ser exibidos em respostas JSON, se necessário
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos do PHP.
     *
     * @var array
     */
    protected $casts = [
        // Aqui você pode definir conversões de tipo para campos específicos, se necessário
    ];

    /**
     * Relacionamento: Um departamento tem muitos usuários.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany(Usuario::class); // Define que um departamento pode ter vários usuários associados
    }

    /**
     * Relacionamento: Um departamento tem muitas atividades.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function atividades()
    {
        return $this->hasMany(Atividade::class); // Define que um departamento pode ter várias atividades associadas
    }
}
