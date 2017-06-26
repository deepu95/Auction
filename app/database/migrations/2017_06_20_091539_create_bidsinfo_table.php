<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bidsinfo', function(Blueprint $table)		
		{		
			$table->increments('bid_id');		
				$table->integer('auction_id');	
				$table->string('auction_name',30);	
				$table->string('user_id',30);	
				$table->float('bid_amount');			//$table->rememberToken();			
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
		Schema::drop('bidsinfo');
	}

}
