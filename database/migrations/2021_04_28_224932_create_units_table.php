<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_name');
            $table->foreignId('dept_id')
                ->constrained('depts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('governorate_id')
                ->constrained('governorates')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('address');
            $table->text('services');
            $table->string('price');
            $table->foreignId('interval_id')
                ->constrained('intervals')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('client_id')->nullable()
                ->constrained('clients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('count');
            $table->integer('available_number');
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
        Schema::dropIfExists('units');
    }
}
