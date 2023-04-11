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
        Schema::table('customers', function (Blueprint $table) {
            $table
                ->foreign('building_id')
                ->references('id')
                ->on('buildings')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('campus_id')
                ->references('id')
                ->on('campuses')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('organizational_unit_id')
                ->references('id')
                ->on('organizational_units')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('floor_id')
                ->references('id')
                ->on('floors')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign(['building_id']);
            $table->dropForeign(['campus_id']);
            $table->dropForeign(['organizational_unit_id']);
            $table->dropForeign(['floor_id']);
            $table->dropForeign(['user_id']);
        });
    }
};
