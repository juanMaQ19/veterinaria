<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->string('estado');
            $table->text('horario')->nullable(); // Change the 'horario' column type to 'text' and nullable
            $table->timestamps();
        });
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cita_id');
            $table->string('horario');
            $table->timestamps();

            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
        });

       
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
        Schema::dropIfExists('citas');
    }
}
