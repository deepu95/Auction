<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('auctions_info',function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('auction_name',30);
            $table->string('user_id',30);
            $table->float('min_bid');
            $table->float('reserved_price');
            $table->float('last_bid_price');
            $table->float('selling_price');
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date');
            $table->time('end_time');
            $table->char('status',6);
            //$table->rememberToken();
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
		//
	}

}
