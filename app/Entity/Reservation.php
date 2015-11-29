<?php

namespace AppBundle\Entity;

/**
 * Reservation
 */
class Reservation {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $datetime;

    /**
     * @var \AppBundle\Entity\Court
     */
    private $court;

    /**
     * @var \AppBundle\Entity\User
     */
    private $user;

    /**
     * Constructor
     *
     * @param dateTime $datetime
     * @param integer $court
     * @param integer $user
     */
    public function __construct($datetime = null) {
        $this->datetime = $datetime;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set datetime
     *
     * @param \DateTime $datetime
     *
     * @return Reservation
     */
    public function setDatetime($datetime) {
        $this->datetime = $datetime;
        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime
     */
    public function getDatetime() {
        return $this->datetime;
    }

    /**
     * Set court
     *
     * @param \AppBundle\Entity\Court $court
     *
     * @return Reservation
     */
    public function setCourt(\AppBundle\Entity\Court $court = null) {
        $this->court = $court;
        return $this;
    }

    /**
     * Get court
     *
     * @return \AppBundle\Entity\Court
     */
    public function getCourt() {
        return $this->court;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Reservation
     */
    public function setUser(\AppBundle\Entity\User $user = null) {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

}
