<?php

namespace App\Controller;

use App\Entity\Craft;
use App\Entity\Raw;
use App\Repository\RawRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class CraftController extends AbstractController
{
    /**
     * @Route("/addCraft", name="addCraft")
     */
    public function addCraft(Request $req, EntityManagerInterface $manager, RawRepository $repoRaw)
    {
        if ($req->request->count() > 0) {
            $craft = new Craft();
            $craft->setName($req->request->get('craftName'));
            if ($req->request->get('raw1') != "") {
                $craft->addIngredient($repoRaw->findOneBy(['name' => $req->request->get('raw1')]));
            }
            dump($craft);
            $manager->persist($craft);
            $manager->flush();
        }

        $raws = $repoRaw->findAll();
        return $this->render('craft/index.html.twig', [
            'raws' => $raws,
        ]);
    }
}
