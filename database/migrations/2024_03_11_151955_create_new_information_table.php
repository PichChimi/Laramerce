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
        Schema::create('new_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('image');
            $table->string('title_cart',100);
            $table->string('short_desc',150);
            $table->string('title',100);
            $table->string('recent_1',90);
            $table->string('recent_2',90);
            $table->string('recent_3',90);
            $table->string('recent_4',90);
            $table->string('recent_5',90);
            $table->string('archive_1',30);
            $table->string('archive_2',30);
            $table->string('archive_3',30);
            $table->string('archive_4',30);
            $table->string('archive_5',30);
            $table->text('desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_information');
    }
};
