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
        Schema::table('employee', function (Blueprint $table) {
            $table->foreignId('department_id')->constrained('department');
            $table->foreignId('position_id')->constrained('position');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee', function (Blueprint $table) {
            $table->dropForeign('employee_department_id_foreign');
            $table->dropForeign('employee_position_id_foreign');

            $table->dropColumn(['department_id', 'position_id']);
        });
    }
};
