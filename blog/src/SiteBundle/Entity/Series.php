<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Series
 *
 * @ORM\Table(name="series")
 * @ORM\Entity(repositoryClass="SiteBundle\Repository\SeriesRepository")
 */
class Series
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Episode", inversedBy="series")
     */
    private $episodes;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="string", length=255)
     */
    private $synopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="poster", type="string", length=255)
     */
    private $poster;

    /**
     * @var string
     *
     * @ORM\Column(name="persons", type="string", length=255)
     */
    private $persons;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="Comment", inversedBy="series")
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="RatingSeries", inversedBy="series")
     */
    private $ratings;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="seriesFollowed")
     */
    private $followedBy;

    /**
     * @var string
     *
     * 
     */
    private $validated;

    /**
     * @var string
     *
     * 
     */
    private $oldId;


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
     * Set name
     *
     * @param string $name
     *
     * @return SeriesFr
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set episode
     *
     * @param string $episode
     *
     * @return SeriesFr
     */
    public function setEpisode($episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return string
     */
    public function getEpisode()
    {
        return $this->episode;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     *
     * @return SeriesFr
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set poster
     *
     * @param string $poster
     *
     * @return SeriesFr
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Get poster
     *
     * @return string
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Set persons
     *
     * @param string $persons
     *
     * @return SeriesFr
     */
    public function setPersons($persons)
    {
        $this->persons = $persons;

        return $this;
    }

    /**
     * Get persons
     *
     * @return string
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return SeriesFr
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set ratings
     *
     * @param string $ratings
     *
     * @return SeriesFr
     */
    public function setRatings($ratings)
    {
        $this->ratings = $ratings;

        return $this;
    }

    /**
     * Get ratings
     *
     * @return string
     */
    public function getRatings()
    {
        return $this->ratings;
    }

    /**
     * Set followedBy
     *
     * @param string $followedBy
     *
     * @return SeriesFr
     */
    public function setFollowedBy($followedBy)
    {
        $this->followedBy = $followedBy;

        return $this;
    }

    /**
     * Get followedBy
     *
     * @return string
     */
    public function getFollowedBy()
    {
        return $this->followedBy;
    }
}

