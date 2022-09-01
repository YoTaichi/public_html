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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string(column:'title');
            $table->string(column:'tag');
            $table->text(column:'content');
            /* $table->varchar(column:'images'); */
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->softDeletes();
            $table->foreignId(column:'user_id');
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
        Schema::dropIfExists('articles');
    }
};
