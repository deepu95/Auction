<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userinfo', function(Blueprint $table)
		{

			$table->increments('id');
			$table->string('name',30);
			$table->string('email',40)->unique();
			$table->string('password');
			$table->char('gender',1);
            $table->rememberToken();
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
		Schema::drop('userinfo');
	}

}
