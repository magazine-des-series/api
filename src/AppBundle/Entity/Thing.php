<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *     collectionOperations={},
 *     iri="http://schema.org/Thing",
 *     itemOperations={}
 * )
 *
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="class", type="string")
 */
abstract class Thing
{
    /**
     * @ApiProperty(writable=false)
     *
     * @ORM\ManyToMany(mappedBy="mentions", targetEntity="Article")
     *
     * @var Article[]|Collection
     */
    protected $articles = [];

    /**
     * @ApiProperty(writable=false)
     *
     * @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Id
     *
     * @var null|string
     */
    protected $id;

    /**
     * @return Article[]
     */
    public function getArticles(): array
    {
        return $this->articles instanceof Collection ? $this->articles->toArray() : $this->articles;
    }

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }
}
