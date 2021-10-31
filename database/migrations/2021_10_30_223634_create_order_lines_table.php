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
        Schema::create('order_lines', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->unsignedInteger('retail')->default(0);
            $table->unsignedInteger('cost')->default(0);
            $table->unsignedInteger('quantity')->default(0);

            $table->morphs('purchasable');

            $table->foreignId('order_id')->index()->nullable()->constrained()->nullOnDelete();
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
        Schema::dropIfExists('order_lines');
    }
};
