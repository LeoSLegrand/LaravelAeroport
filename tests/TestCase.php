<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function withFaker()
{
    return \Faker\Factory::create('fr_FR'); // Modify this line if necessary
}
}
