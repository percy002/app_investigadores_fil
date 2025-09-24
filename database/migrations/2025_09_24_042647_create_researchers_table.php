<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('researchers', function (Blueprint $table) {
            $table->id();
            $table->string('apellidos_nombres');
            $table->enum('genero', ["Masculino","Femenino","Otro"]);
            $table->string('documento_de_identidad');
            $table->string('pais_nacimiento');
            $table->date('fecha_nacimiento');
            $table->string('correo_institucional');
            $table->string('facultad_escuela');
            $table->string('categoria_docente');
            $table->string('tipo_contrato');
            $table->string('codigo_renacyt');
            $table->string('orcid');
            $table->string('tipo_ocupacion');
            $table->string('cti_vitae');
            $table->json('produccion_cientifica');
            $table->json('proyectos_investigacion');
            $table->json('linea_investigacion');
            $table->json('contacto_academico');
            $table->text('resumen_bibliografia');
            $table->enum('status', ["activo","inactivo"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('researchers');
    }
};
