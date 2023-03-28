<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Invoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->reference('id')->on('customers');
            $table->timestamp('date_created')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->string('amount');
        });
    }


//     CREATE TABLE `invoices` (
//          id bigint(20) UNSIGNED NOT NULL,
//           customer_id bigint(20) UNSIGNED NOT NULL, 
//           date_created timestamp NOT NULL DEFAULT current_timestamp(), 
//           amount varchar(255) COLLATE utf8_unicode_ci NOT NULL, 
//           FOREIGN KEY (customer_id) REFERENCES customers(id) 
//           ) 
// ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
