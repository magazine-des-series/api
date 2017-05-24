<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     attributes={
 *         "filters"={"api.filter.tv_series"}
 *     },
 *     iri="http://schema.org/TVSeries"
 * )
 *
 * @ORM\Entity
 */
class TvSeries extends Thing
{
    /**
     * @ApiProperty(iri="http://schema.org/actors")
     *
     * @ORM\ManyToMany(targetEntity="Person")
     *
     * @var Collection|Person[]
     */
    private $actors = [];

    /**
     * @ApiProperty(iri="http://schema.org/description")
     *
     * @Assert\Type(type="string")
     *
     * @ORM\Column(nullable=true, type="text")
     *
     * @var null|string
     */
    private $description;

    /**
     * @ApiProperty(iri="http://schema.org/name")
     *
     * @Assert\NotBlank
     * @Assert\Type(type="string")
     *
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $name;

    /**
     * @param Person $person
     */
    public function addActor(Person $person): void
    {
        $this->actors[$person->getId()] = $person;
    }

    /**
     * @return Person[]
     */
    public function getActors(): array
    {
        return $this->actors instanceof Collection ? $this->actors->toArray() : $this->actors;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param Person $person
     */
    public function removeActor(Person $person): void
    {
        unset($this->actors[$person->getId()]);
    }

    /**
     * @param null|string $summary
     */
    public function setDescription(?string $summary): void
    {
        $this->description = $summary;
        if (empty($this->description)) {
            $this->description = null;
        }
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
