<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * ShareGroup
 *
 * @ORM\Table(name="share_group", uniqueConstraints={@ORM\UniqueConstraint(name="slug_UNIQUE", columns={"slug"})})
 * @ORM\Entity
 */
class ShareGroup
{
    /**
     * One product has many features. This is the inverse side.
     * @OneToMany(targetEntity="Person", mappedBy="ShareGroup")
     */
    private $persons;


    public function __construct() {
        $this->persons = new ArrayCollection();
    }





    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return bool
     */
    public function isClosed()
    {
        return $this->closed;
    }

    /**
     * @param bool $closed
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    }

    /**
     * @var boolApp\Entity
     *
     * @ORM\Column(name="closed", type="boolean", nullable=false)
     */
    private $closed = '0';


}
