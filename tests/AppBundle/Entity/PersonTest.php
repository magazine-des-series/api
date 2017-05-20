<?php

declare(strict_types=1);

namespace tests\AppBundle\Entity;

use AppBundle\Entity\Person;

class PersonTest extends \PHPUnit_Framework_TestCase
{
    public function testSetDescription() : void
    {
        $person = new Person();
        $person->setDescription('');

        $this->assertNull($person->getDescription());
    }
}
