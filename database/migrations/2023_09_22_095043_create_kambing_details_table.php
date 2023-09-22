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
        Schema::create('kambing_details',function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->uuid('kambing_id');
            $table->foreign('kambing_id')->references('id')->on('kambings');
            $table->uuid('member_id');
            $table->foreign('member_id')->references('id')->on('members');
            $table->text('file_kontrak');
            $table->text('file_kontrak_signed')->nullable();
            $table->integer('status')->comment("0: tidak aktif, 1: aktif");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kambing_details');
    }
};
