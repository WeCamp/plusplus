<?php

/**
 * @author brian ridley <ptlis@ptlis.net>
 */

namespace Wecamp\Bundle\PlusplusBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Wecamp\Bundle\PlusplusBundle\Entity\PlusOne;
use Wecamp\Bundle\PlusplusBundle\Entity\Subject;

/**
 * Simple controller for downloading labels & 'plus ones' against them.
 */
class DownloadController extends Controller
{
    /**
     * Download a JSON representation of the 'plus one' data.
     *
     * @return JsonResponse
     */
    public function downloadAction()
    {
        $subjectRepo = $this->getDoctrineService()->getSubjectRepository();

        /** @var Subject[] $subjectList */
        $subjectList = $subjectRepo->findAll();

        $jsonBody = [];
        foreach ($subjectList as $subject) {
            $jsonBody[$subject->getName()] = [];

            /** @var PlusOne $plusOne */
            foreach ($subject->getPlusOnes() as $plusOne) {
                $jsonBody[$subject->getName()][] = [
                    'latitude' => $plusOne->getLatitude(),
                    'longitude' => $plusOne->getLongitude(),
                    'created' => $plusOne->getCreated()->format('c')
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