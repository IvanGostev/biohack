<?php

use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('chains', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained()->cascadeOnDelete();
            $table->foreignId('to');
            $table->foreign('to')->references('id')->on('countries')->onDelete('cascade');
            $table->foreignId('from');
            $table->foreign('from')->references('id')->on('countries')->onDelete('cascade');
            $table->foreignIdFor(Delivery::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('chains');
    }
};
