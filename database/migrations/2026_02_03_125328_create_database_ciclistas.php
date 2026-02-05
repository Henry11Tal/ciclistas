<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseCiclistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ciclista', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 80);
            $table->string('apellidos', 80);
            $table->date('fecha_nacimiento');
            $table->decimal('peso_base', 5, 2)->nullable();
            $table->integer('altura_base')->nullable();
            $table->string('email', 80);
            $table->string('password', 30);
            $table->timestamps();
        });

        Schema::create('historico_ciclista', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ciclista');
            $table->date('fecha');
            $table->decimal('peso', 5, 2)->nullable();
            $table->integer('ftp')->nullable();
            $table->integer('pulso_max')->nullable();
            $table->integer('pulso_reposo')->nullable();
            $table->integer('potencia_max')->nullable();
            $table->decimal('grasa_corporal', 4, 2)->nullable();
            $table->decimal('vo2max', 4, 1)->nullable();
            $table->string('comentario', 255)->nullable();
            $table->timestamps();

            $table->foreign('id_ciclista')->references('id')->on('ciclista')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['id_ciclista', 'fecha']);
        });

        Schema::create('plan_entrenamiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ciclista');
            $table->string('nombre', 100);
            $table->string('descripcion', 255)->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('objetivo', 100)->nullable();
            $table->boolean('activo')->default(1);
            $table->timestamps();

            $table->foreign('id_ciclista')->references('id')->on('ciclista')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('bloque_entrenamiento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion', 255)->nullable();
            $table->enum('tipo', ['rodaje', 'intervalos', 'fuerza', 'recuperacion', 'test']);
            $table->time('duracion_estimada')->nullable();
            $table->decimal('potencia_pct_min', 5, 2)->nullable();
            $table->decimal('potencia_pct_max', 5, 2)->nullable();
            $table->decimal('pulso_pct_max', 5, 2)->nullable();
            $table->decimal('pulso_reserva_pct', 5, 2)->nullable();
            $table->string('comentario', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ciclistas');
        Schema::dropIfExists('historico_ciclista');
        Schema::dropIfExists('plan_entrenamiento');
        Schema::dropIfExists('bloque_entrenamiento');
    }
}
