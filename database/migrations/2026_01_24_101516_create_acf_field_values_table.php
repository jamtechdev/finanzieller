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
        Schema::create('acf_field_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_id')->constrained('acf_fields')->onDelete('cascade');
            $table->string('entity_type')->default('page'); // page, post, etc.
            $table->string('entity_id')->default('home'); // home, about, etc.
            $table->integer('row_index')->nullable(); // for repeater fields
            $table->text('value')->nullable(); // simple text value
            $table->json('meta_value')->nullable(); // complex data (arrays, objects)
            $table->timestamps();

            $table->index(['field_id', 'entity_type', 'entity_id', 'row_index']);
            $table->unique(['field_id', 'entity_type', 'entity_id', 'row_index'], 'unique_field_value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acf_field_values');
    }
};
