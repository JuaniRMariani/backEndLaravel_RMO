<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void{
        Schema::create('joboffer', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('description');
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->string('location');
            $table->string('company_name');
            $table->string('company_logo')->nullable();
            $table->date('published_date')->default(now());
            $table->date('expires_date')->nullable();
            $table->string('postulation_type'); 
            $table->string('email_contact')->nullable();
            $table->string('post_link')->nullable();
            $table->uuid('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('joboffer');
    }
};
