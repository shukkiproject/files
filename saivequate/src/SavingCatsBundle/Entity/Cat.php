<?php

namespace SavingCatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * Cat
 *
 * @ORM\Table(name="cat")
 * @ORM\Entity(repositoryClass="SavingCatsBundle\Repository\CatRepository")
 * @ExclusionPolicy("all") 
 */
class Cat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="maidenName", type="string", length=255)
     * @Expose
     */
    private $maidenName;

    /**
     * @var string
     *
     * @ORM\Column(name="colours", type="string", length=255, nullable=true)
     * @Expose
     */
    private $colours;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255, nullable=true)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     * @Expose
     */
    private $photo;

    /**
     * @var int
     *
     * @ORM\Column(name="waistSize", type="integer", nullable=true)
     * @Expose
     */
    private $waistSize;

    /**
     * @var int
     *
     * @ORM\Column(name="earSize", type="integer", nullable=true)
     * @Expose
     */
    private $earSize;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", nullable=true)
     * @Expose
     */
    private $weight;

    /**
     * @var string
     *
     * @ORM\Column(name="favouriteColour", type="string", length=255, nullable=true)
     * @Expose
     */
    private $favouriteColour;

    /**
     * @var string
     *
     * @ORM\Column(name="quality1", type="string", length=255, nullable=true)
     * @Expose
     */
    private $quality1;

        /**
     * @var string
     *
     * @ORM\Column(name="quality2", type="string", length=255, nullable=true)
     * @Expose
     */
    private $quality2;

    /**
     * @var string
     *
     * @ORM\Column(name="weakness", type="string", length=255, nullable=true)
     * @Expose
     */
    private $weakness;

    /**
     * @var string
     *
     * @ORM\Column(name="favouriteBrand", type="string", length=255, nullable=true)
     * @Expose
     */
    private $favouriteBrand;

    /**
     * @var bool
     *
     * @ORM\Column(name="availability", type="boolean", nullable=true)
     * @Expose
     */
    private $availability;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set maidenName
     *
     * @param string $maidenName
     *
     * @return Cat
     */
    public function setMaidenName($maidenName)
    {
        $this->maidenName = $maidenName;

        return $this;
    }

    /**
     * Get maidenName
     *
     * @return string
     */
    public function getMaidenName()
    {
        return $this->maidenName;
    }

    /**
     * Set colours
     *
     * @param string $colours
     *
     * @return Cat
     */
    public function setColours($colours)
    {
        $this->colours = $colours;

        return $this;
    }

    /**
     * Get colours
     *
     * @return string
     */
    public function getColours()
    {
        return $this->colours;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return Cat
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Cat
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set waistSize
     *
     * @param integer $waistSize
     *
     * @return Cat
     */
    public function setWaistSize($waistSize)
    {
        $this->waistSize = $waistSize;

        return $this;
    }

    /**
     * Get waistSize
     *
     * @return int
     */
    public function getWaistSize()
    {
        return $this->waistSize;
    }

    /**
     * Set earSize
     *
     * @param integer $earSize
     *
     * @return Cat
     */
    public function setEarSize($earSize)
    {
        $this->earSize = $earSize;

        return $this;
    }

    /**
     * Get earSize
     *
     * @return int
     */
    public function getEarSize()
    {
        return $this->earSize;
    }

    /**
     * Set weight
     *
     * @param float $weight
     *
     * @return Cat
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set favouriteColour
     *
     * @param string $favouriteColour
     *
     * @return Cat
     */
    public function setFavouriteColour($favouriteColour)
    {
        $this->favouriteColour = $favouriteColour;

        return $this;
    }

    /**
     * Get favouriteColour
     *
     * @return string
     */
    public function getFavouriteColour()
    {
        return $this->favouriteColour;
    }



    /**
     * Set weakness
     *
     * @param string $weakness
     *
     * @return Cat
     */
    public function setWeakness($weakness)
    {
        $this->weakness = $weakness;

        return $this;
    }

    /**
     * Get weakness
     *
     * @return string
     */
    public function getWeakness()
    {
        return $this->weakness;
    }

    /**
     * Set favouriteBrand
     *
     * @param string $favouriteBrand
     *
     * @return Cat
     */
    public function setFavouriteBrand($favouriteBrand)
    {
        $this->favouriteBrand = $favouriteBrand;

        return $this;
    }

    /**
     * Get favouriteBrand
     *
     * @return string
     */
    public function getFavouriteBrand()
    {
        return $this->favouriteBrand;
    }

    /**
     * Set availability
     *
     * @param boolean $availability
     *
     * @return Cat
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;

        return $this;
    }

    /**
     * Get availability
     *
     * @return bool
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set quality1
     *
     * @param string $quality1
     *
     * @return Cat
     */
    public function setQuality1($quality1)
    {
        $this->quality1 = $quality1;

        return $this;
    }

    /**
     * Get quality1
     *
     * @return string
     */
    public function getQuality1()
    {
        return $this->quality1;
    }

    /**
     * Set quality2
     *
     * @param string $quality2
     *
     * @return Cat
     */
    public function setQuality2($quality2)
    {
        $this->quality2 = $quality2;

        return $this;
    }

    /**
     * Get quality2
     *
     * @return string
     */
    public function getQuality2()
    {
        return $this->quality2;
    }
}
