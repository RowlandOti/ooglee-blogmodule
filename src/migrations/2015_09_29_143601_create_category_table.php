<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
    	Schema::create('tb_blog_category', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('main_image')->nullable();
            $table->text('summary');
            $table->bigInteger('count_views');
            $table->enum('status', array('DRAFT', 'APPROVED'))->default('DRAFT');
		    $table->dateTime('published_at')->nullable();
		    $table->dateTime('deleted_at')->nullable();
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
        Schema::drop('tb_blog_category');
	}

}
