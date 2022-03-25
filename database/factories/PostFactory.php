<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement($array = array ('1','2','3')),
        'title_post' => $faker->randomElement($array = array ('Nuevo Post')),
        'description_post' => $faker->randomElement($array = array ('Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse accusantium ullam officia rem, 
        eum voluptatum incidunt laboriosam tenetur ipsa corrupti voluptate ut omnis provident itaque
         fugit maxime, odit modi quibusdam!Quia, dolorum molestias ut quisquam facere eos, enim id repellat
         , aperiam ex voluptates harum nihil beatae quod amet.','Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse accusantium ullam officia rem, 
         eum voluptatum incidunt laboriosam tenetur ipsa corrupti voluptate ut omnis provident itaque
          fugit maxime, odit modi quibusdam!Quia, dolorum molestias ut quisquam facere eos, enim id repellat
          , aperiam ex voluptates harum nihil beatae quod amet.')),
    ];
});
