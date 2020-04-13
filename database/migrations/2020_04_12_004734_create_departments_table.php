<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)
                ->unique();
            $table->text('description')
                ->nullable();
            $table->timestamps();
        });

        $now = Carbon::now();

        // add default values to the table
        DB::table('departments')->insert(
            [
                [
                    'name'          => 'Sales',
                    'created_at'    => $now,
                    'updated_at'    => $now
                ],
                [
                    'name'          => 'Human Resources',
                    'created_at'    => $now,
                    'updated_at'    => $now
                ],
                [
                    'name'          => 'Management',
                    'created_at'    => $now,
                    'updated_at'    => $now
                ],
                [
                    'name'          => 'Support',
                    'created_at'    => $now,
                    'updated_at'    => $now
                ]
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
        Schema::dropIfExists('departments');
    }
}
