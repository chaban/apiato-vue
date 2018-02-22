<?php

/**
 *
 */
class FakerGenerator
{
    private $faker;

    function __construct()
    {
        $faker = new \Faker\Generator();
        $faker->addProvider(new \Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new \Faker\Provider\en_US\Address($faker));
        $faker->addProvider(new \Faker\Provider\en_US\PhoneNumber($faker));
        $faker->addProvider(new \Faker\Provider\en_US\Company($faker));
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        $faker->addProvider(new \Faker\Provider\Internet($faker));
        $faker->addProvider(new \Faker\Provider\at_AT\Payment($faker));
        $faker->addProvider(new \Faker\Provider\DateTime($faker));
        $this->faker = $faker;
    }

    public function generate()
    {
        return $this->faker;
    }
}
