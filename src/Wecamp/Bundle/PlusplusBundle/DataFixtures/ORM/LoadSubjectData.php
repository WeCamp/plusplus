<?php

/**
 * @author brian ridley <ptlis@ptlis.net>
 */

namespace Wecamp\Bundle\PlusplusBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wecamp\Bundle\PlusplusBundle\Entity\Subject;

/**
 * Load test subjects.
 */
class LoadSubjectData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load subject data fixtures.
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $beersSubject = new Subject();
        $beersSubject->setName('Beers Drunk');
        $manager->persist($beersSubject);
        $this->addReference('subject-beers', $beersSubject);

        $hangoversSubject = new Subject();
        $hangoversSubject->setName('Hangovers Endured');
        $manager->persist($hangoversSubject);
        $this->addReference('subject-hangovers', $hangoversSubject);

        $pizzasSubject = new Subject();
        $pizzasSubject->setName('Pizzas Eaten');
        $manager->persist($pizzasSubject);
        $this->addReference('subject-pizzas', $pizzasSubject);

        $manager->flush();
    }

    /**
     * Subjects must be loaded first!
     *
     * @return integer
     */
    function getOrder()
    {
        return 1;
    }
} 