<?php

namespace BdRentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\Entity(repositoryClass="BdRentalBundle\Repository\MembreRepository") @ORM\HasLifecycleCallbacks
 */
class Membre
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
     * @ORM\Column(name="createdDate", type="datetime")
     */
    private $createdDate;

    /**
     * @var date
     *
     * @ORM\Column(name="editedDate", type="datetime")
     */
    private $editedDate;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="BD", mappedBy="proprietaire")
     */
    private $bds;

        /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Location", mappedBy="membre", cascade={"remove"})
     */
    private $locations;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Membre
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set locations
     *
     * @param string $locations
     *
     * @return Membre
     */
    public function setLocations($locations)
    {
        $this->locations = $locations;

        return $this;
    }

    /**
     * Get locations
     *
     * @return string
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * Set bds
     *
     * @param string $bds
     *
     * @return Membre
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
        return $this->nom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bds = new \Doctrine\Common\Collections\ArrayCollection();
        $this->locations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return Membre
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set editedDate
     *
     * @param \DateTime $editedDate
     *
     * @return Membre
     */
    public function setEditedDate($editedDate)
    {
        $this->editedDate = $editedDate;

        return $this;
    }

    /**
     * Get editedDate
     *
     * @return \DateTime
     */
    public function getEditedDate()
    {
        return $this->editedDate;
    }

    /**
     * Add bd
     *
     * @param \BdRentalBundle\Entity\BD $bd
     *
     * @return Membre
     */
    public function addBd(\BdRentalBundle\Entity\BD $bd)
    {
        $this->bds[] = $bd;

        return $this;
    }

    /**
     * Remove bd
     *
     * @param \BdRentalBundle\Entity\BD $bd
     */
    public function removeBd(\BdRentalBundle\Entity\BD $bd)
    {
        $this->bds->removeElement($bd);
    }

    /**
     * Add location
     *
     * @param \BdRentalBundle\Entity\Location $location
     *
     * @return Membre
     */
    public function addLocation(\BdRentalBundle\Entity\Location $location)
    {
        $this->locations[] = $location;

        return $this;
    }

    /**
     * Remove location
     *
     * @param \BdRentalBundle\Entity\Location $location
     */
    public function removeLocation(\BdRentalBundle\Entity\Location $location)
    {
        $this->locations->removeElement($location);
    }

        /**
     * @ORM\PrePersist*/
    public function initialyseDate()
    {
        $date = new \DateTime('now');
        $this->setCreatedDate($date);
    }
    /**
     * @ORM\PreUpdate
     */
    public function initialyseDateRetour()
    {
        $dateRetour = new \DateTime('now');
        
        $this->setEditedDate($dateRetour);
    }
}
