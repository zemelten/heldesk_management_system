<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organizational_units', function (Blueprint $table) {
            $table
                ->foreign('campuse_id')
                ->references('id')
                ->on('campuses')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('building_id')
                ->references('id')
                ->on('buildings')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('prioritie_id')
                ->references('id')
                ->on('priorities')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organizational_units', function (Blueprint $table) {
            $table->dropForeign(['campuse_id']);
            $table->dropForeign(['building_id']);
            $table->dropForeign(['prioritie_id']);
        });
    }
};
