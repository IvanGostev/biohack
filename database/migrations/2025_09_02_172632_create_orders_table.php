<?php

use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Delivery::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->bigInteger('count');
            $table->bigInteger('price');
            $table->unsignedBigInteger('to')->index();
            $table->unsignedBigInteger('from')->index();
            $table->foreign('to')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('from')->references('id')->on('countries')->onDelete('cascade');
            $table->string('status')->default('delivery'); // in delivery / delivered
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
