<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientController extends AbstractController
{
    #[Route('/clients', name: 'app_clients')]
    public function index(ClientRepository $clientRepository): Response
    {
        $clients = $clientRepository->findAll();

        return $this->render('clients/index.html.twig', [
            'clients' => $clients,
        ]);
    }

    #[Route('/clients/ajouter', name: 'app_clients_ajouter')]
    public function ajouter(ClientRepository $clientRepository): Response
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $clientRepository->ajouterClient($_POST['prenom'], $_POST['nom'], $_POST['telephone'], $_POST['mail'], $_POST['adresse'], $_POST['codePostal']);
            
            return $this->redirectToRoute('app_clients');
        }

        return $this->render('clients/ajout_client.html.twig');
    }

    #[Route('/clients/modifier/{ idClient }', name: 'app_clients_modifier')]
    public function modifier(ClientRepository $clientRepository): Response
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $clientRepository->modifierClient($_POST['prenom'], $_POST['nom'], $_POST['telephone'], $_POST['mail'], $_POST['adresse'], $_POST['codePostal']);
            
            return $this->redirectToRoute('app_clients');
        }
        
        
        return $this->render('clients/modifier_client.html.twig');
    }

    #[Route('/clients', name: 'app_clients_supprimer')]
    public function supprimerClient(ClientRepository $clientRepository): Response
    {
        
        return $this->render('clients/index.html.twig');
    }
}