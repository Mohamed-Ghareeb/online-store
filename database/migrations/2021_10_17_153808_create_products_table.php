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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->mediumText('description');
            $table->unsignedInteger('cost');
            $table->unsignedInteger('retail');
            $table->boolean('active')->defualt(true);
            /**
             * @todo Move default to confi/env variable
             */
            $table->boolean('vat')->defualt(config('shop.vat'));
            $table->foreignId('category_id')->index()->constrained();
            $table->foreignId('range_id')->nullable()->index()->constrained();
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
        Schema::dropIfExists('products');
    }
};
