<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutorespondersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoresponders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();   
            $table->string('name')->unique(); 
            $table->boolean('double_optin')->default('1');
            $table->string('from_name');
            $table->string('from_email');
            $table->string('redirect_subscribe')->nullable();
            $table->string('redirect_confirm')->nullable();
            $table->text('header_text')->nullable();
            $table->text('header_html')->nullable();
            $table->text('footer_text')->nullable();
            $table->text('footer_html')->nullable();
            $table->string('auto_removed_from')->nullable();
            $table->text('confirm_subject')->nullable();
            $table->text('confirm_body_text')->nullable();
            $table->text('confirm_body_html')->nullable();
            $table->string('status',5)->default("P");
            $table->boolean('notify_user')->default('0');
            $table->string('token',31)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->engine = 'InnoDB';
            $table->index('user_id');

            $table  ->foreign('user_id')->references('id')->on('users')
                    ->onDelete('cascade')->onUpdate('cascade');              
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autoresponders');
    }
}
