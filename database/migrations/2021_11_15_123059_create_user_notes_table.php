<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade');
            $table->foreignId('note_id')->constrained()->onUpdate('cascade');
            $table->foreignId('role_note_id')->unsigned()->constrained()->onUpdate('cascade')->nullable();
            $table->foreignId('author_id')->constrained('users')->onUpdate('cascade')->nullable();
            $table->boolean('liked');
            $table->boolean('shared');
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
        Schema::dropIfExists('user_notes');
    }
}
