<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->id();
            $table->date('data_atividade');
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->text('descricao');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained()->onDelete('cascade');
            $table->foreignId('departamento_id')->constrained()->onDelete('cascade');
            $table->enum('status', ['Concluído', 'Em andamento', 'Agendado', 'Aguardando', 'Cancelado']);
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atividades');
    }
};
