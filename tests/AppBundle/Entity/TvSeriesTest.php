<?php

declare(strict_types=1);

namespace tests\AppBundle\Entity;

use AppBundle\Entity\TvSeries;

class TvSeriesTest extends \PHPUnit_Framework_TestCase
{
    public function testSetDescription(): void
    {
        $series = new TvSeries();
        $series->setDescription('');

        $this->assertNull($series->getDescription());
    }
}
