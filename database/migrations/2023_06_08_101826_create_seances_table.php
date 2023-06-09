<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_module");
            $table->foreign("id_module")->references("id")->on("modules") ;

            $table->unsignedBigInteger("id_formateur");
            $table->foreign("id_formateur")->references("id")->on("formateurs");

            $table->unsignedBigInteger("id_groupe");
            $table->foreign("id_groupe")->references("id")->on("groupes");
            
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
        Schema::dropIfExists('seances');
    }
};
