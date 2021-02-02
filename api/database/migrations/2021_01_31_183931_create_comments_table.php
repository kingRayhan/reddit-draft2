<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->foreignIdFor(\App\Models\User::class)
                ->constrained()
                ->onDelete('cascade');
            $table->foreignIdFor(\App\Models\Thread::class)
                ->constrained()
                ->onDelete('cascade');

            $table->unsignedBigInteger('parent_id')->index()->nullable();
            $table->foreign('parent_id')
                ->on('comments')
                ->references('id')
                ->onDelete('cascade');

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
        Schema::dropIfExists('comments');
    }
}
