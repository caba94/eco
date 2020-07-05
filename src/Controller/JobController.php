<?php

namespace App\Controller;

use App\Entity\Job;
use App\Repository\JobRepository;
use App\Repository\RawRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class JobController extends AbstractController
{
    /**
     * @Route("/", name="jobIndex")
     */
    public function index(JobRepository $repo)
    {
       
        $job = $repo->findAll();
        return $this->render('job/index.html.twig', [
            'jobs' => $job,
        ]);
    }

    /**
     * @Route("/job/{id}", name="job")
     */
    public function job(Job $job)
    {
        return $this->render('job/job.html.twig', [
            'job' => $job,
        ]);
    }

    
}
