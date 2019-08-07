<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_products', function (Blueprint $table) {
            $table->increments('prod_id');
            $table->string('prod_name');
            $table->string('prod_slug');
            $table->integer('prod_price');
            $table->string('prod_img');
            $table->string('prod_warranty');//bảo hành
            $table->string('prod_accessories');//phụ kiện
            $table->string('prod_condition');//Tình trạng
            $table->string('prod_promotion');//khuyến mãi
            $table->tinyInteger('prod_status');//Trạng thái
            $table->text('prod_description');//Miêu tả
            $table->tinyInteger('prod_featured');//Sản phẩm đặc biệt
            $table->integer('prod_cate')->unsigned();//Danh mục
            $table->foreign('prod_cate')
                  ->references('cate_id')
                  ->on('vp_categories')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('vp_products');
    }
}
