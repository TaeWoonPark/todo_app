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
        Schema::create('momos', function (Blueprint $table) {
            $table->integer('status')->default(1)->comment('優先度: 1=未着手, 2=進行中, 3=完了');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
