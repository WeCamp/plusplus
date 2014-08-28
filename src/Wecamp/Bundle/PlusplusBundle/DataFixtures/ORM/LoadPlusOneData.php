<?php

/**
 * @author brian ridley <ptlis@ptlis.net>
 */

namespace Wecamp\Bundle\PlusplusBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Wecamp\Bundle\PlusplusBundle\Entity\PlusOne;

/**
 * Load test plus one data.
 */
class LoadPlusOneData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * Load plus one data fixtures.
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $beersSubject = $this->getReference('subject-beers');
        $pizzasSubject = $this->getReference('subject-pizzas');
        $hangoversSubject = $this->getReference('subject-hangovers');

        // Monday night
        $beerOne = new PlusOne();
        $beerOne
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-25 19:13:51'))
            ->setLatitude(52.371523)
            ->setLongitude(5.634121);
        $manager->persist($beerOne);

        $beerTwo = new PlusOne();
        $beerTwo
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-25 19:55:24'))
            ->setLatitude(52.372132)
            ->setLongitude(5.633412);
        $manager->persist($beerTwo);

        $beerThree = new PlusOne();
        $beerThree
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-25 20:31:19'))
            ->setLatitude(52.371823)
            ->setLongitude(5.633241);
        $manager->persist($beerThree);

        $beerFour = new PlusOne();
        $beerFour
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-25 21.08:11'))
            ->setLatitude(52.372313)
            ->setLongitude(5.635123);
        $manager->persist($beerFour);

        $beerFive = new PlusOne();
        $beerFive
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-25 22.01:36'))
            ->setLatitude(52.371673)
            ->setLongitude(5.634123);
        $manager->persist($beerFive);


        // TODO: Tuesday, Wed. Thu

        // 52.371509, 5.632548
        // 52.373439, 5.636241


        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }
}