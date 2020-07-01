<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Model;
use Faker\Generator as Faker;

use App\Incident;
use App\IncidentType;
use App\User;

$factory->define(Incident::class, function (Faker $faker) {
    $incident_type = IncidentType::select('id')->inRandomOrder()->first();
    $user = User::select('id')->inRandomOrder()->first();
    return [
        'incident_type_id'      => $incident_type->id,
        'user_id'               => $user->id,
        'incident_date'         => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
        'description'           => $faker->text(),
        'action_taken'          => $faker->text(),
        'created_at'            => Carbon::now(),
        'updated_at'            => Carbon::now()
    ];
});
