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
        Schema::table('tickets', function (Blueprint $table) {
            $table
                ->foreign('customer_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

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
                ->foreign('problem_id')
                ->references('id')
                ->on('problems')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('organizational_unit_id')
                ->references('id')
                ->on('organizational_units')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('user_support_id')
                ->references('id')
                ->on('user_supports')
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
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['campuse_id']);
            $table->dropForeign(['building_id']);
            $table->dropForeign(['problem_id']);
            $table->dropForeign(['organizational_unit_id']);
            $table->dropForeign(['user_support_id']);
            $table->dropForeign(['prioritie_id']);
            $table->dropForeign(['customer_id']);
        });
    }
};
