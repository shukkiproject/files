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
     * @ORM\OneToMany(targetEntity="SeriesComment", inversedBy="user")
     * 
     */
    private $seriesComments;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="EpisodeComment", inversedBy="user")
     * 
     */
    private $episodeComments;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="RatingSeries", inversedBy="user")
     * 
     */
    private $ratingsSeries;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="SeriesComment", mappedBy="likedBy")
     * 
     */
    private $seriesCommentLiked;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="SeriesComment", mappedBy="dislikedBy")
     * 
     */
    private $seriesCommentDisliked;

    /**
     * @var string
     * @ORM\ManyToMany(targetEntity="Series", inversedBy="followedBy")
     * 
     */
    private $seriesFollowed;

    /**
     * @var string
     *
     * 
     */
    private $episodeViewed;

    /**
     * @var string
     *
     * 
     */
    private $notifications;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}