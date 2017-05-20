<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(iri="http://schema.org/Article")
 *
 * @ORM\Entity
 */
class Article extends Thing
{
    /**
     * @ApiProperty(iri="http://schema.org/articleBody")
     *
     * @Assert\NotBlank
     * @Assert\Type(type="string")
     *
     * @ORM\Column(type="text")
     *
     * @var string
     */
    private $body;

    /**
     * @ApiProperty(iri="http://schema.org/mentions")
     *
     * @ORM\ManyToMany(inversedBy="articles", targetEntity="Thing")
     *
     * @var Collection|Thing[]
     */
    private $mentions = [];

    /**
     * @param Thing $thing
     */
    public function addMention(Thing $thing) : void
    {
        $this->mentions[$thing->getId()] = $thing;
    }

    /**
     * @return null|string
     */
    public function getBody() : ? string
    {
        return $this->body;
    }

    /**
     * @return Thing[]
     */
    public function getMentions() : array
    {
        return $this->mentions instanceof Collection ? $this->mentions->toArray() : $this->mentions;
    }

    /**
     * @param Thing $thing
     */
    public function removeMention(Thing $thing) : void
    {
        unset($this->mentions[$thing->getId()]);
    }

    /**
     * @param string $body
     */
    public function setBody(string $body) : void
    {
        $this->body = $body;
    }
}
