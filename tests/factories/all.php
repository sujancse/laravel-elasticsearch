<?php

$factory('App\Employee',[
  'name' => $faker->name,
  'designation' => $faker->word,
  'salary' => $faker->numberBetween(1000,10000)
]);
