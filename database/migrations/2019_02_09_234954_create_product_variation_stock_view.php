<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationStockView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
            DB::statement("                
                CREATE VIEW product_variation_stock_view as 
                     select 
                     product_variations.product_id as product_id, 
                     product_variations.id as product_variation_id, 
                     COALESCE(sum(stocks.quantity) - COALESCE(SUM(product_variation_order.quantity), 0), 0) as stock,
                     case when COALESCE(sum(stocks.quantity) - COALESCE(SUM(product_variation_order.quantity), 0), 0) > 0
                       then true
                       else false
                       end in_stock
                     from product_variations 
                     left join (
                        select 
                         stocks.product_variation_id as id, 
                         sum(stocks.quantity) as quantity 
                         from stocks 
                         group by stocks.product_variation_id
                     ) as stocks using(id) 
                     left join (
                         select
                           product_variation_order.product_variation_id as id,
                           sum(product_variation_order.quantity) as quantity
                         from product_variation_order
                         group by product_variation_order.product_variation_id
                         ) as product_variation_order using (id)
                         group by product_variations.id
             ");
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       DB::statement("DROP VIEW IF EXISTS product_variation_stock_view");
    }
}
