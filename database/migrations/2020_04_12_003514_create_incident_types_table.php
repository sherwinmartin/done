<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateIncidentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incident_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)
                ->unique();
            $table->text('description')
                ->nullable();
            $table->timestamps();
        });

        // add default values to the table
        DB::table('incident_types')->insert(
            [
                ['name' => 'Infraction'],
                ['name' => 'Attendance'],
                ['name' => 'Commendation']
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incident_types');
    }
}
