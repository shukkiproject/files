<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LikingComment
 *
 * @ORM\Table(name="liking_comment")
 * @ORM\Entity(repositoryClass="SiteBundle\Repository\LikingCommentRepository")
 */
class LikingComment
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
     * @ORM\ManyToOne(targetEntity="User", mappedBy="likingComment")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Comment", mappedBy="likings")
     */
    private $comment;

    /**
     * @var bool
     *
     * @ORM\Column(name="liking", type="boolean")
     */
    private $liking;


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
     * @return RatingComment
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
     * Set comment
     *
     * @param string $comment
     *
     * @return RatingComment
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
     * Set liking
     *
     * @param boolean $liking
     *
     * @return RatingComment
     */
    public function setLiking($liking)
    {
        $this->liking = $liking;

        return $this;
    }

    /**
     * Get liking
     *
     * @return bool
     */
    public function getLiking()
    {
        return $this->liking;
    }
}

