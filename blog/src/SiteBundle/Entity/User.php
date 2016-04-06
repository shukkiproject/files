<?php

namespace SiteBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="CommentTv", mappedBy="user")
     * 
     */
    private $comments;

    /**
     * @var string
     * @ORM\ManyToMany(targetEntity="Series", mappedBy="ratings")
     * 
     */
    private $seriesRatings;

    /**
     * @var string
     * @ORM\ManyToMany(targetEntity="CommentTv", mappedBy="likedBy")
     * @JoinTable(name="users_comments_liked")
     */
    private $commentsLiked;

    /**
     * @var string
     * @ORM\ManyToMany(targetEntity="CommentTv", mappedBy="dislikedBy")
     * @JoinTable(name="users_comments_disliked")
     */
    private $commentsDisliked;

    /**
     * @var string
     * @ORM\ManyToMany(targetEntity="Series", inversedBy="followedBy")
     * 
     */
    private $seriesFollowed;

    /**
     * @var string
     * @ORM\ManyToMany(targetEntity="Episode", inversedBy="viewedBy")
     * 
     */
    private $episodesViewed;

    /**
     * @var string
     * @ORM\Column(name="notifications", type="text", length=255)
     * 
     */
    private $notifications;

    /**
     * @var boolean
     * @ORM\Column(name="flagged", type="text", length=255)
     * 
     */
    private $flagged;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}