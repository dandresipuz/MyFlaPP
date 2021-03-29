<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residentials', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->text("description");
            $table->string('photo')->default('images/no-residential.png');
            $table->boolean('active')->default(1);
            $table->bigInteger('phone');
            $table->string('address');
            $table->boolean("slider")->default(0);
            $table->float('price')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string("city");
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
        Schema::dropIfExists('residentials');
    }
}
