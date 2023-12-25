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
        Schema::table('accessary', function (Blueprint $table) {
            $table->foreignId('supplier_id')->constrained('supplier');
            $table->foreignId('type_id')->constrained('accessary_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accessary', function (Blueprint $table) {
            $table->dropForeign('booking_accessary_supplier_id_foreign');
            $table->dropForeign('booking_accessary_accessary_type_id_foreign');
            
            $table->dropColumn(['supplier_id']);
            $table->dropColumn(['accessary_id']);
        });
    }
};
