<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            // No id column
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique(); // Unique field for record identification
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('bio')->nullable();
            $table->json('social_links')->nullable();
            $table->timestamp('created_at')->useCurrent(); // Auto-populate on creation
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate(); // Auto-update on changes
            
            // Composite key if needed (optional, based on your requirements)
            $table->primary(['email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about');
    }
}
