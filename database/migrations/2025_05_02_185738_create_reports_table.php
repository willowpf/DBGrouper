<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            
            $table->id();
            $table->string('type'); // report type
            $table->json('parameters')->nullable(); // custom parameters
            $table->string('status')->default('pending'); // pending, processing, completed, failed
            $table->timestamp('requested_at')->useCurrent();
            $table->timestamp('completed_at')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_format')->nullable(); // pdf, csv, etc.
            $table->integer('file_size')->nullable(); // in bytes
            $table->softDeletes(); // for archiving
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
};