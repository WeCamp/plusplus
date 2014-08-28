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
        $subjectOne = new Subject();
        $subjectOne->setName('Beer Drunk');
        $manager->persist($subjectOne);
        $this->addReference('subject-one', $subjectOne);

        $subjectTwo = new Subject();
        $subjectTwo->setName('Pizza Eaten');
        $manager->persist($subjectTwo);
        $this->addReference('subject-two', $subjectTwo);

        $subjectThree = new Subject();
        $subjectThree->setName('Hangovers Endured');
        $manager->persist($subjectThree);
        $this->addReference('subject-three', $subjectThree);

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