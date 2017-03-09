<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // Rajouter plus tard les colonnes jaquette, cale, etc...
      Schema::create('games', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('console');
          $table->boolean('boite')->default(false);
          $table->boolean('notice')->default(false);
          $table->text('note')->nullable();
          $table->timestamps();
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')
                 ->references('id')
                 ->on('users')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('games', function(Blueprint $table) {
          $table->dropForeign('games_user_id_foreign');
      });
      Schema::drop('games');
    }
}
