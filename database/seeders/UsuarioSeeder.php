<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario; // Certifique-se de que o modelo Usuario existe
use App\Models\Departamento; // Certifique-se de que o modelo Departamento existe

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lista de usuários com seus respectivos departamentos
        $usuarios = [
            ['nome' => 'ADÃO CORREIA DA SILVA MENEZES', 'departamento' => 'INFORMÁTICA'],
            ['nome' => 'ALESSANDRO DE ALMEIDA CAMPOS', 'departamento' => 'SUPERINTENDÊNCIA'],
            ['nome' => 'ALEX TORRES DOS SANTOS', 'departamento' => 'FINANCEIRO'],
            ['nome' => 'ANA LUCIA ARAUJA ALMEIDA', 'departamento' => 'PROTOCOLO'],
            ['nome' => 'ANA PAULA RODRIGUES P. DE ARAÚJO', 'departamento' => 'JURÍDICO'],
            ['nome' => 'ANTONIO CARLOS SILVA DE SOUSA', 'departamento' => 'GOVERNANÇA'],
            ['nome' => 'ANTONIO BANDEIRA COSTA MARTINS', 'departamento' => 'SUPERINTENDÊNCIA'],
            ['nome' => 'APRÍGIO AGUIAR DE OLIVEIRA DE SOUSA CAMELO', 'departamento' => 'JURÍDICO'],
            ['nome' => 'CARULINE EMANUELLE VAZ RESPLANDES', 'departamento' => 'GOVERNANÇA'],
            ['nome' => 'DEOCLECIANO GOMES FILHO', 'departamento' => 'GABINETE SECRETÁRIO'],
            ['nome' => 'DISNÉA DIAS LIMA', 'departamento' => 'DIÁRIO OFICIAL'],
            ['nome' => 'EDILMA AFONSO COSTA', 'departamento' => 'PROTOCOLO'],
            ['nome' => 'FELIPE-TSÉ MEDEIROS DE CARVALHO', 'departamento' => 'JURÍDICO'],
            ['nome' => 'GABRIEL NUNES POVOA JACOBINA AIRES', 'departamento' => 'JURÍDICO'],
            ['nome' => 'GISELE REGINA ROCHA', 'departamento' => 'ATOS'],
            ['nome' => 'HELVIO ALVARES FERREIRA', 'departamento' => 'ATOS'],
            ['nome' => 'IZALTINA MASCARENHAS AIRES NETA', 'departamento' => 'GOVERNANÇA'],
            ['nome' => 'JACILENE FRAZÃO DA LUZ', 'departamento' => 'DIÁRIO OFICIAL'],
            ['nome' => 'JEFFERSON CRISTIANO DA COSTA MACEDO', 'departamento' => 'DIÁRIO OFICIAL'],
            ['nome' => 'JORDANA ALVES SILVA', 'departamento' => 'JURÍDICO'],
            ['nome' => 'LARISSA SILVA FELIPE MACHADO MATOS', 'departamento' => 'FINANCEIRO'],
            ['nome' => 'LEONARDO ESPINDOLA DE ABREU', 'departamento' => 'DIÁRIO OFICIAL'],
            ['nome' => 'LEONARDO NAVARRO AQUILINO', 'departamento' => 'JURÍDICO'],
            ['nome' => 'LETICIA NUNES RIBEIRO', 'departamento' => 'DIÁRIO OFICIAL'],
            ['nome' => 'LUCAS OLIVEIRA BATISTA ALVES', 'departamento' => 'SUPERINTENDÊNCIA'],
            ['nome' => 'LUCIANO GOMES DOS SANTOS', 'departamento' => 'ATOS'],
            ['nome' => 'LUNA MAR RODRIGUES BEZERRA', 'departamento' => 'FINANCEIRO'],
            ['nome' => 'MARCO XAVIER', 'departamento' => 'DIÁRIO OFICIAL'],
            ['nome' => 'MARIA DE JESUS COSTA DA SILVA', 'departamento' => 'ASSESSORIA DE GABINETE'],
            ['nome' => 'MARIA JOSÉ MORAIS DE ARAUJO', 'departamento' => 'ACOMPANHAMENTO LEGISLATIVO'],
            ['nome' => 'MAX DAY RODRIGUES', 'departamento' => 'DIÁRIO OFICIAL'],
            ['nome' => 'NÁDIA SOUSA SANTOS', 'departamento' => 'ATOS'],
            ['nome' => 'NATANRY HELENA DE SOUZA BASTOS', 'departamento' => 'JURÍDICO'],
            ['nome' => 'NELSON MUNIZ FILHO', 'departamento' => 'DIÁRIO OFICIAL'],
            ['nome' => 'RODRIGO FOGAÇA PROPECIO', 'departamento' => 'JURÍDICO'],
            ['nome' => 'ROSANA MANICA TELES SANTOS', 'departamento' => 'SUPERINTENDÊNCIA'],
            ['nome' => 'ROSIVALDO FREITAS DE SOUZA FILHO', 'departamento' => 'INFORMÁTICA'],
            ['nome' => 'SAMIA CAROLINE CABRAL SILVESTRE', 'departamento' => 'JURÍDICO'],
            ['nome' => 'SATIKO KAJI CAVALCANTE', 'departamento' => 'ATOS'],
            ['nome' => 'SEBASTIÃO PEREIRA NEUSIN NETO', 'departamento' => 'GABINETE SECRETÁRIO'],
            ['nome' => 'SIMONE PEREIRA BRITO', 'departamento' => 'GOVERNANÇA'],
            ['nome' => 'SINVALDO CONCEIÇÃO NEVES', 'departamento' => 'SUPERINTENDÊNCIA'],
            ['nome' => 'TELMA RODRIGUES CAVALCANTE RENOVATO', 'departamento' => 'SUPERINTENDÊNCIA'],
            ['nome' => 'MIKE ALENCAR SILVA', 'departamento' => 'SUPERINTENDÊNCIA'],
            ['nome' => 'FABIANO BARROSO ARAUJO MIRANDA', 'departamento' => 'INFORMÁTICA'],
            ['nome' => 'SAMARAH BEATRIZ LORENTINO AYRES', 'departamento' => 'JURÍDICO'],
        ];

        // Inserir os usuários no banco de dados
        foreach ($usuarios as $usuarioData) {
            // Encontrar o departamento pelo nome
            $departamento = Departamento::where('nome', $usuarioData['departamento'])->first();

            // Criar o usuário associado ao departamento
            if ($departamento) {
                Usuario::create([
                    'nome' => $usuarioData['nome'],
                    'departamento_id' => $departamento->id,
                ]);
            }
        }
    }
}