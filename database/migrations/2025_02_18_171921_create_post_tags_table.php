<?php

use App\Models\Tag;
use App\Models\Post;
use App\Models\PostTag;
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
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        //pivotal table
        Schema::create('post_post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Post::class, 'post_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(PostTag::class, 'post_tag_id')->constrained('post_tags')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_post_tag');
        Schema::dropIfExists('post_tags'); 
    }
};
