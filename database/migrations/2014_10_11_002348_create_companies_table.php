<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = Carbon::now();

        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')
                ->unique();
            $table->string('address')
                ->nullable();
            $table->string('city', 100)
                ->nullable();
            $table->char('state', 2)
                ->nullable();
            $table->string('zip', 20)
                ->nullable();
            $table->timestamps();
        });

        DB::table('companies')->insert(
            ['name' => 'Done App Inc']
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
