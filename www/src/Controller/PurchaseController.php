<?php

namespace App\Controller;

use App\Document\Purchase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ODM\MongoDB\DocumentManager as DocumentManager;

class PurchaseController
{
    /**
     * @Route("/purchase/{id}", name="get_purchase")
     */

    public function __construct (DocumentManager $dm)
    {
        $this->dm = $dm;
    }
    /**
     * @Route("/purchase/{id}", name="get_purchase")
     */
    public function show(string $id)
    {
        $purchase = $this->dm->find(Purchase::class, $id);

        var_dump($purchase);
        return new JsonResponse(['data' => $purchase]);
    }

    /**
     * @Route("/purchase", name="save_purchase", methods={"POST"})
     */
    public function store(Request $request)
    {

        $data = json_decode($request->getContent());

        $receipt = $data->document->receipt;
        $purchase = new Purchase();
        $purchase->user = $receipt->user;
        $purchase->userInn = $receipt->userInn;
        $purchase->userInn = $receipt->userInn;
        $this->dm->persist($purchase);
        $this->dm->flush();

        return new JsonResponse(['success' => true, 'purchase_id' => $purchase->id]);
    }
}