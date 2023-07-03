<?php

namespace App\Controller;

use App\Entity\Rating;
use App\Entity\Project;
use App\Entity\Vico;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/api', name: 'api_')]
class ProjectController extends AbstractController
{
    #[Route(path: '/projects/clientId={clientId}', name: 'projects', methods: ['get'])]
    public function index(ManagerRegistry $doctrine, Request $request): JsonResponse
    {
        dd($request->headers);
        $clientId = $request->request->get('clientId');
        $projects = $doctrine
            ->getRepository(Project::class)
            ->findBy(array('creator_id', $clientId));

        $data = [];

        foreach ($projects as $project) {
            $data[] = [
                'id'         => $project->getId(),
                'title'      => $project->getTitle(),
                'creator'    => $project->getCreatorId(),
                'created_at' => $project->getCreatedAt()
            ];
        }

        return $this->json($data);
    }

    #[Route('/projects/{id}', name: 'rate_show', methods: ['get'])]
    public function show(ManagerRegistry $doctrine,Request $request, int $id): JsonResponse
    {
        $id = $request->request->get('projectId');
        $project = $doctrine->getRepository(Project::class)->find($id);
        $vicoId = $project->getVicoId();
        $vico = $doctrine->getRepository(Vico::class)->find('id', $vicoId);
        $rate = $doctrine->getRepository(Rating::class)->find('project_id', $id);

        if (!$vico) return $this->json('No Vico found with the id: '.$vicoId.'.');
        if (!$project) return $this->json('There is no project with the id: '.$id.'.');
        if (!$rate) return $this->json('This project doesn\'t have any rating.');

        $data = [
            'project' => [
                'id'    => $project->getId(),
                'title' => $project->getTitle(),
            ],
            'rating' => [
                'id'                         => $rate->getId(),
                'review_text'                => $rate->getReviewText(),
                'money_value_rate'           => $rate->getMoneyValueRate(),
                'work_quality_rate'          => $rate->getWorkQualityRate(),
                'communication_rate'         => $rate->getCommunicationRate(),
                'overall_satisfication_rate' => $rate->getOverallSatisficationRate(),
                'project_id'                 => $rate->getProjectId()
            ],
            'vico'   => [
                'id'   => $vico->getId(),
                'name' => $vico->getName()
            ]
        ];

        return $this->json($data);
    }

    #[Route('/projects/{id}', name: 'rate_update', methods: ['put', 'patch'])]
    public function update(ManagerRegistry $doctrine, Request $request, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $projectId = $request->request->get('projectId'); 
        $rate = $entityManager->getRepository(Rating::class)->find('project_id', $projectId);

        if (!$rate) return $this->json('No rate has been found for the project with id: ' . $id, 404);

        $rate->setReviewText($request->request->get('review_text'));
        $rate->getMoneyValueRate($request->request->get('money_value_rate'));
        $rate->getWorkQualityRate($request->request->get('work_quality_rate'));
        $rate->getCommunicationRate($request->request->get('communication_rate'));
        $rate->setOverallSatisficationRate($request->request->get('overall_satisfication_rate'));

        $entityManager->flush();

        $data = [
            'id'                         => $rate->getId(),
            'review_text'                => $rate->getReviewText(),
            'money_value_rate'           => $rate->getMoneyValueRate(),
            'work_quality_rate'          => $rate->getWorkQualityRate(),
            'communication_rate'         => $rate->getCommunicationRate(),
            'overall_satisfication_rate' => $rate->getOverallSatisficationRate(),
        ];

        return $this->json($data);
    }

    #[Route('/projects/{id}', name: 'rate_delete', methods: ['delete'])]
    public function delete(ManagerRegistry $doctrine, Request $request, int $id): JsonResponse
    {
        $entityManager = $doctrine->getManager();
        $projectId = $request->request->get('projectId'); 
        $rate = $entityManager->getRepository(Rating::class)->find('project_id', $projectId);
        $id = $rate->getId();
        if (!$rate) return $this->json('No rate has been found for the project with id: ' . $id, 404);

        $entityManager->remove($rate);
        $entityManager->flush();
   
        return $this->json('Deleted the rate successfully with id ' . $id);
    }
}
