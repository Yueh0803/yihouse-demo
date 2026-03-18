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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('line_id')->nullable()->after('phone');
            $table->string('google_id')->nullable()->after('line_id');
            $table->enum('role', ['member', 'staff', 'admin'])->default('member')->after('google_id');
            $table->boolean('is_active')->default(true)->after('role');
            $table->string('member_number')->nullable()->unique()->after('is_active');
            $table->date('birth_date')->nullable()->after('member_number');
            $table->text('address')->nullable()->after('birth_date');
            $table->string('payment_method')->nullable()->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'line_id', 'google_id', 'role', 'is_active', 'member_number', 'birth_date', 'address', 'payment_method']);
        });
    }
};
