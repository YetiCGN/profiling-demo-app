<?php
namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateTestDataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('demo:generateTestData')
            ->setDescription('Generate test data and save it to the internal database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Generating people...');

        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $this->getContainer()->get('doctrine')->getManager();

        $faker = \Faker\Factory::create();
        $people = [];
        for ($i = 0; $i < 50; $i++) {
            $person = new \AppBundle\Entity\Person();
            $person->setFirstName($faker->firstName);
            $person->setLastName($faker->lastName);
            $person->setBirthday($faker->dateTimeBetween('-60 years', '-18 years'));
            $entityManager->persist($person);
            $people[] = $person;

            $output->write('.');
        }
        $output->writeln('');

        $output->writeln('Generating calendars with entries...');
        for ($i = 0; $i < 200; $i++) {
            $calendar = new \AppBundle\Entity\Calendar();
            $calendar->setOwner($faker->randomElement($people));
            $entityManager->persist($calendar);

            for ($j = 0; $j < $faker->randomDigit; $j++) {
                $entry = new \AppBundle\Entity\Entry();
                $entry->setWhen($faker->dateTimeThisYear);
                $entry->setWhat($faker->text);
                $entry->setCalendar($calendar);
                $entityManager->persist($entry);
            }

            $output->write('.');
        }


        $entityManager->flush();
    }
}
