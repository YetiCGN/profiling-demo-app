<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Entry
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="when_date", type="datetime", nullable=false)
     */
    private $when;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $what;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Calendar", inversedBy="entries")
     * @ORM\JoinColumn(name="calendarId", referencedColumnName="id")
     */
    private $calendar;

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
     * Set when
     *
     * @param \DateTime $when
     * @return Entry
     */
    public function setWhen($when)
    {
        $this->when = $when;

        return $this;
    }

    /**
     * Get when
     *
     * @return \DateTime
     */
    public function getWhen()
    {
        return $this->when;
    }

    /**
     * Set what
     *
     * @param string $what
     * @return Entry
     */
    public function setWhat($what)
    {
        $this->what = $what;

        return $this;
    }

    /**
     * Get what
     *
     * @return string
     */
    public function getWhat()
    {
        return $this->what;
    }

    /**
     * Set calendar
     *
     * @param Calendar $calendar
     * @return Entry
     */
    public function setCalendar(Calendar $calendar = null)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * Get calendar
     *
     * @return Calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }
}
