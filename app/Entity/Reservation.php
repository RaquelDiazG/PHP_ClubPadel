<?php

namespace AppBundle\Entity;

/**
 * Reservation
 */
class Reservation
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $datetime;

    /**
     * @var \AppBundle\Entity\Courts
     */
    private $court;

    /**
     * @var \AppBundle\Entity\Users
     */
    private $user;


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
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Reservation
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set court
     *
     * @param \AppBundle\Entity\Courts $court
     *
     * @return Reservation
     */
    public function setCourt(\AppBundle\Entity\Courts $court = null)
    {
        $this->court = $court;

        return $this;
    }

    /**
     * Get court
     *
     * @return \AppBundle\Entity\Courts
     */
    public function getCourt()
    {
        return $this->court;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\Users $user
     *
     * @return Reservation
     */
    public function setUser(\AppBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }
}

