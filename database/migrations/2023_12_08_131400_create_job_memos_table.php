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
        Schema::create('job_memos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('job_title');
            $table->date('deadline')->nullable();;
            $table->string('experience')->nullable();
            $table->string('tech_stack')->nullable();
            $table->string('location')->nullable();;
            $table->boolean('interview_called')->default(false);
            $table->boolean('interview_attended')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_memos');
    }
};
