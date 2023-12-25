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
        Schema::table('order_detail', function (Blueprint $table) {
            $table->foreignId('orders_id')->constrained('orders');
            $table->foreignId('accessary_id')->constrained('accessary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_detail', function (Blueprint $table) {
            $table->dropForeign('order_detail_order_id_foreign');
            $table->dropForeign('order_detail_accessary_id_foreign');

            $table->dropColumn(['orders_id']);
            $table->dropColumn(['accessary_id']);
        });
    }
};
