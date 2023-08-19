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
        Schema::create('category_movies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('category_id');

            // Add foreign key constraints with onDelete('cascade')
            $table->foreign('movie_id', 'cm_movie_fk')
                ->on('movies')
                ->references('id')
                ->onDelete('cascade'); // Add this line

            $table->foreign('category_id', 'cm_category_fk')
                ->on('categories')
                ->references('id')
                ->onDelete('cascade'); // Add this line

            $table->index('movie_id', 'cm_movie_idx');
            $table->index('category_id', 'cm_category_idx');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_movies');
    }
};
