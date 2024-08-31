<?php

use Illuminate\Support\Facades\Schema;
use OoBook\Priceable\Models\Price;
use Illuminate\Database\Schema\Blueprint;
use OoBook\Priceable\Models\PriceType;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('priceable.tables.price_types'), function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('priceable.tables.price_types'));
    }
};
