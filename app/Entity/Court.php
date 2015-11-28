<?php   // app/Entity/Court.php

namespace AppBundle\Entity;

/**
 * Court
 */
class Court
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $active;
    
    /**
     * Constructor
     * @param boolean $active
     */
    public function __construct($active=true)
    {
        $this->active = $active;
    }
    
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Court
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }
}

