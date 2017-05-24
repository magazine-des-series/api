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
 *         "filters"={"api.filter.person"}
 *     },
 *     iri="http://schema.org/Person"
 * )
 *
 * @ORM\Entity
 */
class Person extends Thing
{
    /**
     * @ApiProperty(iri="http://schema.org/birthDate")
     *
     * @Assert\DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     *
     * @var \DateTime|null
     */
    private $birthDate;

    /**
     * @ApiProperty(iri="http://schema.org/deathDate")
     *
     * @Assert\DateTime
     *
     * @ORM\Column(nullable=true, type="datetime")
     *
     * @var \DateTime|null
     */
    private $deathDate;

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
     * @ApiProperty(iri="http://schema.org/givenName")
     *
     * @Assert\NotBlank
     * @Assert\Type(type="string")
     *
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $firstName;

    /**
     * @ORM\ManyToMany(targetEntity="Job")
     *
     * @var Collection|Job[]
     */
    private $jobs = [];

    /**
     * @ApiProperty(iri="http://schema.org/familyName")
     *
     * @Assert\NotBlank
     * @Assert\Type(type="string")
     *
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $lastName;

    /**
     * @param Job $job
     */
    public function addJob(Job $job): void
    {
        $this->jobs[$job->getId()] = $job;
    }

    /**
     * @return \DateTime|null
     */
    public function getBirthDate(): ?\DateTime
    {
        return $this->birthDate;
    }

    /**
     * @return \DateTime|null
     */
    public function getDeathDate(): ?\DateTime
    {
        return $this->deathDate;
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
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return Job[]
     */
    public function getJobs(): array
    {
        return $this->jobs instanceof Collection ? $this->jobs->toArray() : $this->jobs;
    }

    /**
     * @return null|string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param Job $job
     */
    public function removeJob(Job $job): void
    {
        unset($this->jobs[$job->getId()]);
    }

    /**
     * @param \DateTime|null $birthDate
     */
    public function setBirthDate(\DateTime $birthDate = null): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @param \DateTime|null $deathDate
     */
    public function setDeathDate(\DateTime $deathDate = null): void
    {
        $this->deathDate = $deathDate;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
        if (empty($this->description)) {
            $this->description = null;
        }
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }
}
