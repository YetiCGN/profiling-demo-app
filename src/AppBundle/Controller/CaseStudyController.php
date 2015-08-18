<?php

namespace AppBundle\Controller;

use AppBundle\Library\Singleton;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CaseStudyController extends Controller
{
    /**
     * Starting website with overview of case studies
     *
     * @Route("/case-study", name="case-study-overview")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * Simulates database access
     *
     * @Route("/case-study/calendar", name="case-study-calendar")
     * @Template()
     */
    public function calendarAction()
    {
        $people = $this->getDoctrine()->getRepository('AppBundle:Person')->findAll();
        return array('people' => $people);
    }

    /**
     * Simulates the use of a singleton pattern.
     *
     * @Route("/case-study/singleton", name="case-study-singleton")
     * @Template()
     */
    public function singletonAction()
    {
        $numberOfUses = 1000;
        $container = array();

        for ($i = 1; $i <= $numberOfUses; $i++)
        {
            $singleton = Singleton::getInstance();
            $singleton->identifier = 'Hello world, I am Singleton #' . $i . '!';

            $container[] = $singleton;
        }

        return array('container' => $container);
    }
}
