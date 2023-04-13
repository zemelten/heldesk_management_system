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
        Schema::table('escalated_tickets', function (Blueprint $table) {
            $table
                ->foreign('ticket_id')
                ->references('id')
                ->on('tickets')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('user_support_id')
                ->references('id')
                ->on('user_supports')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('queue_type_id')
                ->references('id')
                ->on('queue_types')
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
        Schema::table('escalated_tickets', function (Blueprint $table) {
            $table->dropForeign(['ticket_id']);
            $table->dropForeign(['user_support_id']);
            $table->dropForeign(['queue_type_id']);
        });
    }
};
