<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('user_vote', function (Blueprint $table) {
        $table->date('date')->default(now()); // Cambia la posizione 'after' a seconda delle tue esigenze
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('user_vote', function (Blueprint $table) {
        $table->dropColumn('date');
    });
}
};
