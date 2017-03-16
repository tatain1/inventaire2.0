<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MajGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('games', function($table) {
        $table->boolean('jaquette')->default(false);
        $table->boolean('cale')->default(false);
        $table->boolean('fourreau')->default(false);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('games', function($table) {
          $table->dropColumn('jaquette');
          $table->dropColumn('cale');
          $table->dropColumn('fourreau');
      });
    }
}

// `id` int(11) NOT NULL,
//   `jaquette` varchar(255) NOT NULL,
//   `cale` varchar(255) NOT NULL,
//   `fourreau` varchar(255) NOT NULL,
//   `status` tinyint(1) NOT NULL,
