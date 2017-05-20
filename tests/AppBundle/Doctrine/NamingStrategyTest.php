<?php

declare(strict_types=1);

namespace tests\AppBundle\Doctrine;

use AppBundle\Doctrine\NamingStrategy;

class NamingStrategyTest extends \PHPUnit_Framework_TestCase
{
    public function testClassToTableName() : void
    {
        $namingStrategy = new NamingStrategy();

        $this->assertEquals('people', $namingStrategy->classToTableName('Person'));
        $this->assertEquals('tv_series', $namingStrategy->classToTableName('TvSeries'));
    }

    /**
     * {@inheritdoc}
     */
    public function testJoinKeyColumnName() : void
    {
        $namingStrategy = new NamingStrategy();

        $this->assertEquals('person_id', $namingStrategy->joinKeyColumnName('Person', 'id'));
        $this->assertEquals('tv_series_id', $namingStrategy->joinKeyColumnName('TvSeries', 'id'));
    }

    /**
     * {@inheritdoc}
     */
    public function testJoinTableName() : void
    {
        $namingStrategy = new NamingStrategy();

        $this->assertEquals('person_jobs', $namingStrategy->joinTableName('Person', 'Job', 'jobs'));
        $this->assertEquals('tv_series_actors', $namingStrategy->joinTableName('TvSeries', 'People', 'actors'));
    }
}
