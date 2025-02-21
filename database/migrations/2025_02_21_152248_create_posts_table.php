<?php

use App\Models\Category;
use App\Models\Page;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Page::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('content')->nullable();
            $table->text('resume')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('style')->default('default');
            $table->string('img_cover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
