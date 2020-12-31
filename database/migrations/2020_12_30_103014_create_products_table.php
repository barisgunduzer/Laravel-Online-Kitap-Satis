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
            $table->id()->autoIncrement(); #PK
            $table->string('title',150);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('image',75)->nullable();
            $table->integer('category_id')->nullable(); #FK
            $table->integer('user_id')->nullable(); #FK
            $table->text('book_detail')->nullable();
            $table->float('price')->nullable();
            $table->integer('quantity_in_stock')->default(1);
            $table->integer('min_quantity')->default(5);
            $table->integer('quantity_on_order')->default(0);
            $table->integer('tax')->default(12);
            $table->string('author_name')->nullable();
            $table->string('publisher_name')->nullable();
            $table->string('ISBN',14)->nullable(); #UID
            $table->string('slug',100)->nullable();
            $table->string('status',5)->nullable()->default('False');
            $table->timestamps();
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
