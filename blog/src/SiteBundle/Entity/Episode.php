<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Episode
 *
 * @ORM\Table(name="episode")
 * @ORM\Entity(repositoryClass="SiteBundle\Repository\EpisodeRepository")
 */
class Episode
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
     * @ORM\ManyToOne(targetEntity="Series", inversedBy="episodes")
     */
    private $series;

    /**
     * @var int
     *
     * @ORM\Column(name="season", type="integer")
     */
    private $season;

    /**
     * @var text
     *
     * @ORM\Column(name="synopsis", type="text", length=255)
     */
    private $synopsis;

    /**
     * @var string
     * @ORM\ManyToMany(targetEntity="User", mappedBy="episodesViewed")
     * 
     */
    private $viewedBy;


    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="CommentTv", mappedBy="episode")
     */
    private $comments;

    /**
     * @var boolean
     *
     * 
     */
    private $flagged;


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
     * Set series
     *
     * @param string $series
     *
     * @return EpisodeEn
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set season
     *
     * @param string $season
     *
     * @return EpisodeEn
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return string
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     *
     * @return EpisodeEn
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
}

