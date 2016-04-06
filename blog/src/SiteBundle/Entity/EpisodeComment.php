<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EpisodeComment
 *
 * @ORM\Table(name="Episode_comment")
 * @ORM\Entity(repositoryClass="SiteBundle\Repository\EpisodeCommentRepository")
 */
class EpisodeComment
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Episode", inversedBy="comments")
     */
    private $episode;

    /**
     * @var string
     *
     *
     * 
     */
    private $comment;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="commentsLiked")
     */
    private $likedBy;

    /**
     * @var string
     *
     * @ORM\ManyToMany(targetEntity="User", inversedBy="CommentsDisliked")
     */
    private $dislikedBy;

    /**
     * @var datetime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

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
     * Set user
     *
     * @param string $user
     *
     * @return Comment
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set series
     *
     * @param string $series
     *
     * @return Comment
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set ratings
     *
     * @param string $ratings
     *
     * @return Comment
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
     * Set date
     *
     * @param string $date
     *
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
}

