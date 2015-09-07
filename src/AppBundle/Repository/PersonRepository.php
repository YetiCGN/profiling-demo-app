<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class PersonRepository
 */
class PersonRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function getPersonsWithCalendarEntries()
    {
        return $this->_em->createQuery('SELECT p, b, e FROM AppBundle\Entity\Person p JOIN p.calendars b JOIN b.entries e')
            ->getResult();
    }
}