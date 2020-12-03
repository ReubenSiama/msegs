<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('district_manager_id');
            $table->integer('district_id');
            $table->integer('material_id');
            $table->string('location');
            $table->enum('status',['Pending', 'Processing', 'Received', 'Assign', 'Relocate', 'Complete'])->default('Pending');
            $table->integer('allocated_material_id')->nullable();
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
        Schema::dropIfExists('material_requests');
    }
}
