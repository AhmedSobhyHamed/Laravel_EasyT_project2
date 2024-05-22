<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogpost',function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->foreignId('auther')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogpost',function(Blueprint $table){
            $table->dropForeign(['auther']);
        });
        // Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('blogpost');
        // Schema::enableForeignKeyConstraints();
    }
};
