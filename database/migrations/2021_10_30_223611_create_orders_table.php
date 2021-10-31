<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('number')->unique();
            $table->string('state');
            $table->string('coupon')->nullable();
            $table->unsignedBigInteger('total')->default(0);
            $table->unsignedBigInteger('reduction')->default(0);

            $table->foreignId('user_id')->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignId('shipping_id')->index()->nullable()->constrained()->nullOnDelete();
            $table->foreignId('billing_id')->index()->nullable()->constrained()->nullOnDelete();

            $table->timestamp('completed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
