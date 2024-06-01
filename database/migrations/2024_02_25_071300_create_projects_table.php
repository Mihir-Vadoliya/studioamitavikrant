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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('size');
            $table->string('location');
            $table->string('category_id');
            $table->string('image');
            $table->string('completion_date');
            $table->string('stage');
            $table->string('project_summary_title');
            $table->longText('project_summary_details');
            $table->string('project_team_title');
            $table->longText('project_team_details');
            $table->longText('publications');
            $table->longText('similar_projects');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
