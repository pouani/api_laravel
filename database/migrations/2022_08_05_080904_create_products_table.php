<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 105);
            $table->string('description')->nullable();
            $table->integer('min_qt');
            $table->integer('note')->nullable();
            $table->double('cost');
            $table->timestamps();
            $table->unsignedBigInteger('categorie_produit_id');
            $table->foreign('categorie_produit_id')->references('id')->on('categorie_produits');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
