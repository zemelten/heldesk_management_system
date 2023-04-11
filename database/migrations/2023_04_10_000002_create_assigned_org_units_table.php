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
        Schema::create('assigned_org_units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assigned_office_id')->nullable();
            $table->unsignedBigInteger('organizational_unit_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_org_units');
    }
};
