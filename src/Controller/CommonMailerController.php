<?php

namespace App\Controller;

use App\Domain\Cases\SendCommonMail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommonMailerController extends AbstractController
{
    /**
     * @Route("/api/send-common-mail", methods={"GET"})
     */
    public function sendMail(SendCommonMail $commonMail): JsonResponse
    {
        return new JsonResponse(['data' => 'test']);
    }
}