<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->decimal('total_amount', 10, 2);
            $table->decimal('security_deposit', 10, 2);
            $table->enum('payment_method', ['online', 'cod']);
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
            $table->enum('order_status', ['pending', 'processing', 'out_for_delivery', 'delivered', 'returned', 'cancelled'])->default('pending');
            $table->text('shipping_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
