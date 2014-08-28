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
use Wecamp\Bundle\PlusplusBundle\Entity\Subject;

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
        /** @var Subject $beersSubject */
        $beersSubject = $this->getReference('subject-beers');

        /** @var Subject $pizzasSubject */
        $pizzasSubject = $this->getReference('subject-pizzas');

        /** @var Subject $hangoversSubject */
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

        $hangoverOne = new PlusOne();
        $hangoverOne
            ->setSubject($hangoversSubject)
            ->setCreated(new \DateTime('2014-08-26 07.22:54'))
            ->setLatitude(52.371234)
            ->setLongitude(5.635234);
        $manager->persist($hangoverOne);


        // Tuesday
        $beerSix = new PlusOne();
        $beerSix
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-26 18:28:43'))
            ->setLatitude(52.373423)
            ->setLongitude(5.633123);
        $manager->persist($beerSix);

        $beerSeven = new PlusOne();
        $beerSeven
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-26 19:01:34'))
            ->setLatitude(52.372341)
            ->setLongitude(5.636123);
        $manager->persist($beerSeven);

        $beerEight = new PlusOne();
        $beerEight
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-26 19:55:18'))
            ->setLatitude(52.371784)
            ->setLongitude(5.633232);
        $manager->persist($beerEight);

        $beerNine = new PlusOne();
        $beerNine
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-26 19:55:18'))
            ->setLatitude(52.372323)
            ->setLongitude(5.636123);
        $manager->persist($beerNine);

        $beerTen = new PlusOne();
        $beerTen
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-26 20:15:18'))
            ->setLatitude(52.372234)
            ->setLongitude(5.635234);
        $manager->persist($beerTen);

        $beerEleven = new PlusOne();
        $beerEleven
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-26 21:01:38'))
            ->setLatitude(52.373132)
            ->setLongitude(5.632131);
        $manager->persist($beerEleven);

        $beerTwelve = new PlusOne();
        $beerTwelve
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-27 22:09:45'))
            ->setLatitude(52.372314)
            ->setLongitude(5.636123);
        $manager->persist($beerTwelve);

        $beerThirteen = new PlusOne();
        $beerThirteen
            ->setSubject($beersSubject)
            ->setCreated(new \DateTime('2014-08-27 22:56:08'))
            ->setLatitude(52.371231)
            ->setLongitude(5.635434);
        $manager->persist($beerThirteen);

        $hangoverTwo = new PlusOne();
        $hangoverTwo
            ->setSubject($hangoversSubject)
            ->setCreated(new \DateTime('2014-08-27 11.15:54'))
            ->setLatitude(52.372133)
            ->setLongitude(5.634234);
        $manager->persist($hangoverTwo);



        // TODO: , Wed. Thu

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