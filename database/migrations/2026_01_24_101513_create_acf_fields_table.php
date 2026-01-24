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
        Schema::create('acf_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_group_id')->constrained('acf_field_groups')->onDelete('cascade');
            $table->foreignId('parent_field_id')->nullable()->constrained('acf_fields')->onDelete('cascade');
            $table->string('label');
            $table->string('name'); // field key/slug
            $table->string('type'); // text, textarea, editor, image, repeater, number, etc.
            $table->text('instructions')->nullable();
            $table->boolean('required')->default(false);
            $table->text('default_value')->nullable();
            $table->string('placeholder')->nullable();
            $table->integer('order')->default(0);
            $table->json('settings')->nullable(); // field-specific settings (e.g., image size, editor toolbar)
            $table->timestamps();

            $table->index(['field_group_id', 'order']);
            $table->index('parent_field_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acf_fields');
    }
};
