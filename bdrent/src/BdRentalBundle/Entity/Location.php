<?php

namespace BdRentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Location
 *
 * @ORM\Table(name="location")
 * @ORM\Entity(repositoryClass="BdRentalBundle\Repository\LocationRepository") @ORM\HasLifecycleCallbacks
 */
class Location
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var date
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var date
     *
     * @ORM\Column(name="dateRetour", type="date")
     */
    private $dateRetour;

    /**
     * @var string
     *
     *
     * @ORM\ManyToOne(targetEntity="Membre", inversedBy="locations")
     */
    private $membre;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="BD", inversedBy="locations")
     */
    private $bds;

    /**
     * Get id
     *
     * @return int
    **/
      public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Location
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     *
     * @return Location
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set membre
     *
     * @param string $membre
     *
     * @return Location
     */
    public function setMembre($membre)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre
     *
     * @return string
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * Set bds
     *
     * @param string $bds
     *
     * @return Location
     */
    public function setBds($bds)
    {
        $this->bds = $bds;

        return $this;
    }

    /**
     * Get bds
     *
     * @return string
     */
    public function getBds()
    {
        return $this->bds;
    }

    public function __toString() {
        return $this->date->format("Y-m-d");
        
    }

    /**
     * @ORM\PrePersist*/
    public function initialyseDate()
    {
        $date = new \DateTime('now');
        $this->setDate($date);
    }
    /**
     * @ORM\PrePersist*/
    public function initialyseDateRetour()
    {
        $dateRetour = new \DateTime('now');
        $dateRetour->modify('+15 day');
        $this->setDateRetour($dateRetour);
    }



}

