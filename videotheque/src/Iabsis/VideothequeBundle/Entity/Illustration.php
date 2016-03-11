<?php

namespace Iabsis\VideothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Illustration
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Illustration
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="illustration", type="string", length=255)
     */
    private $illustration;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set illustration
     *
     * @param string $illustration
     * @return Illustration
     */
    public function setIllustration($illustration)
    {
        $this->illustration = $illustration;

        return $this;
    }

    /**
     * Get illustration
     *
     * @return string 
     */
    public function getIllustration()
    {
        return $this->illustration;
    }
}
