<?php

/**
 * @author brian ridley <ptlis@ptlis.net>
 */

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Wecamp\Bundle\PlusplusBundle\Entity\PlusOne;
use Wecamp\Bundle\PlusplusBundle\Entity\Thing;

/**
 * Simple controller for downloading labels & 'plus ones' against them.
 */
class DownloadController extends Controller
{
    public function downloadAction()
    {
        $thingRepo = $this->getDoctrineService()->getThingRepository();

        /** @var Thing[] $thingList */
        $thingList = $thingRepo->findAll();

        $jsonBody = [];
        foreach ($thingList as $thing) {
            $jsonBody[$thing->getName()] = [];

            /** @var PlusOne $plusOne */
            foreach ($thing->getPlusOnes() as $plusOne) {
                $jsonBody[$thing->getName()][] = [
                    'latitude' => $plusOne->getLatitude(),
                    'longitude' => $plusOne->getLongitude(),
                    'created' => $plusOne->getCreated()->format('N')
                ];
            }
        }

        return new JsonResponse(
            $jsonBody,
            JsonResponse::HTTP_OK,
            [
                'Content-Disposition' => 'attachment; filename=plus_plus_data.json'
            ]
        );
    }

    /**
     * @return \Wecamp\Bundle\PlusplusBundle\Service\Doctrine
     */
    private function getDoctrineService()
    {
        return $this->get('wecamp_plusplus.data');
    }
} 