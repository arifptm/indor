<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',31)->unique();
            $table->string('description')->nullable();
            $table->boolean('can_single_optin')->default('0');
            $table->string('status',5)->default('A');
            $table->boolean('show_ads')->default('0');
            $table->string('max_autoresponder')->default('0');
            $table->string('max_subscriber')->default('0');
            $table->string('max_message')->default('0');
            $table->string('max_custom_field')->default('0');
            $table->string('max_option_field')->default('0');
            $table->string('max_link_tracking')->default('0');
            $table->string('max_custom_tag')->default('0');
            $table->string('max_daily_import')->default('25');
            $table->boolean('can_import')->default('0');
            $table->boolean('can_copy_message')->default('0');
            $table->boolean('can_broadcast')->default('0');
            $table->boolean('can_reminder')->default('0');
            $table->timestamps();

            $table->engine = 'InnoDB';            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
