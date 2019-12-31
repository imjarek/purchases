<?php

namespace App\Controller;

use App\Document\Purchase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ODM\MongoDB\DocumentManager as DocumentManager;

class PurchaseController
{
    /**
     * @Route("/purchase/{id}", name="get_purchase")
     */
    public function show(int $id)
    {
        return new JsonResponse(['items' => [$id]]);
    }

    /**
     * @Route("/purchase", name="save_purchase", methods={"POST"})
     */
    public function store(DocumentManager $dm)
    {

        $purchase = new Purchase();
        $purchase->email = "vincent@vfac.fr";
        $purchase->user ="Винсент";
        $purchase->inn = "2323324234";
        $dm->persist($purchase);
        $dm->flush();

        return new JsonResponse(['success' => true, 'purchase_id' => $purchase->id]);
    }
}