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
        Schema::table('booking', function (Blueprint $table) {
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('type_id')->constrained('service_type');
            $table->foreignId('status_id')->constrained('booking_status');
            $table->foreignId('car_id')->constrained('car');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropForeign('booking_customer_id_foreign');
            $table->dropForeign('booking_type_id_foreign');
            $table->dropForeign('booking_status_id_foreign');
            $table->dropForeign('booking_car_id_foreign');

            $table->dropColumn(['customer_id']);
            $table->dropColumn(['type_id']);
            $table->dropColumn(['status_id']);
            $table->dropColumn(['car_id']);
        });
    }
};
