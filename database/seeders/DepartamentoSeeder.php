<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento; // Certifique-se de que o modelo Departamento existe

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lista de departamentos
        $departamentos = [
            'SUPERINTENDÊNCIA',
            'PROTOCOLO',
            'ATOS',
            'JURÍDICO',
            'DIÁRIO OFICIAL',
            'GABINETE SECRETÁRIO',
            'FINANCEIRO',
            'ASSESSORIA DE GABINETE',
            'GOVERNANÇA',
            'ACOMPANHAMENTO LEGISLATIVO',
            'INFORMÁTICA',
        ];

        // Inserir os departamentos no banco de dados
        foreach ($departamentos as $nome) {
            Departamento::create(['nome' => $nome]);
        }
    }
}
