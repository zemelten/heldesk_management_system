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
        Schema::table('assigned_org_units', function (Blueprint $table) {
            $table
                ->foreign('assigned_office_id')
                ->references('id')
                ->on('assigned_offices')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('organizational_unit_id', 'foreign_alias_0000001')
                ->references('id')
                ->on('organizational_units')
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
        Schema::table('assigned_org_units', function (Blueprint $table) {
            $table->dropForeign(['assigned_office_id']);
            $table->dropForeign(['organizational_unit_id']);
        });
    }
};
