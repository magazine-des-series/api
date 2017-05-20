<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 *
 * @ORM\Entity
 */
class Job extends Thing
{
    /**
     * @ApiProperty(iri="http://schema.org/jobTitle")
     *
     * @Assert\NotBlank
     * @Assert\Type(type="string")
     *
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $title;

    /**
     * @return null|string
     */
    public function getTitle() : ? string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }
}
