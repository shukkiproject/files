<?php

namespace BdRentalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BD
 *
 * @ORM\Table(name="bd")
 * @ORM\Entity(repositoryClass="BdRentalBundle\Repository\BDRepository")
 */
class BD
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="dispo", type="boolean")
     */
    private $dispo;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Membre", inversedBy="bds")
     */
    private $proprietaire;

    /**
     * @var [Location]
     *
     * @ORM\ManyToMany(targetEntity="Location", mappedBy="bds")
     */
    private $locations;

    /**
     * Getlocation
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return BD
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return BD
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dispo
     *
     * @param boolean $dispo
     *
     * @return BD
     */
    public function setDispo($dispo)
    {
        $this->dispo = $dispo;

        return $this;
    }

    /**
     * Get dispo
     *
     * @return bool
     */
    public function getDispo()
    {
        return $this->dispo;
    }

    /**
     * Set proprietaire
     *
     * @param string $proprietaire
     *
     * @return BD
     */
    public function setProprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return string
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }

    /**
     * Add location
     *
     * @param \BdRentalBundle\Entity\Location $location
     *
     * @return BD
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

        public function __toString() {
        return $this->titre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->locations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get locations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocations()
    {
        return $this->locations;
    }
}
