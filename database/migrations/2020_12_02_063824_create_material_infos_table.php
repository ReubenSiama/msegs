<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('material_code');
            $table->integer('category_id');
            $table->string('name');
            $table->enum('working_status',['Working','Idle','Reparing'])->default('Idle');
            $table->string('serial_number')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('color')->nullable();
            $table->date('purchase_date');
            $table->string('purchase_price');
            $table->string('current_value');
            $table->date('issue_date');
            $table->string('total_expense');
            $table->date('last_deprication');
            $table->string('deprication_rate');
            $table->integer('supplier_id');
            $table->integer('material_request_id')->nullable();
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
        Schema::dropIfExists('material_infos');
    }
}
