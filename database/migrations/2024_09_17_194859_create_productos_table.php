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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('codigo', 50)->unique();
            $table->string('nombre', 80);
            $table->integer('stock')->unsigned()->default(0);
            $table->text('descripcion', 255)->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->foreignId('marca_id')->unique()->constrained('marcas')->onDelete('cascade');
            $table->foreignId('presentacione_id')->unique()->constrained('presentaciones')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
