<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = Carbon::now();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')
                ->references('id')
                ->on('roles');
            $table->string('username')
                ->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('hire_date')
                ->nullable();
            $table->date('start_date')
                ->nullable();
            $table->char('is_enabled', 1)
                ->default('N');
            $table->dateTime('last_login_date')
                ->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // insert default admin user
        DB::table('users')->insert(
            [
                'role_id'           => 1,
                'username'          => 'admin',
                'email'             => 'admin@doneapp.test',
                'password'          => Hash::make('password'),
                'is_enabled'        => 'Y',
                'created_at'        => $now,
                'updated_at'        => $now
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
        Schema::dropIfExists('users');
    }
}
