<?php

namespace Applications\App\Modules\Afficher;

class AfficherController extends \Library\BackController
{




    public function executeHome(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Accueil");
    }


    public function executePanel(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Abonnements ");
        $ListeClients =  $this->managers->getManagerOf('Afficher')->ListeClient();
        $this->page->addVar("ListeClients", $ListeClients);
        $ListeService =  $this->managers->getManagerOf('Afficher')->ListeService();
        $this->page->addVar("ListeService", $ListeService);

        $ListeAb =  $this->managers->getManagerOf('Afficher')->ListeAb();
        $this->page->addVar("ListeAb", $ListeAb);
        if ($request->method() == 'POST' && !empty($request->postData('message'))) {
            $this->managers->getManagerOf('Administrer')->SendMessage($request->postData('phone'), $request->postData('message'));
            $this->app->httpResponse()->redirect('/dashboard');
        }

        if ($request->method() == 'POST' && !empty($request->postData('RefClient'))) {
            $this->managers->getManagerOf('Administrer')->addAb($request);
            $this->app()->httpResponse()->redirect("/dashboard");
        }
    }

    public function executeClients(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Clients ");
        $ListeClients =  $this->managers->getManagerOf('Afficher')->ListeClient();
        $this->page->addVar("ListeClients", $ListeClients);
    }
    public function executeServices(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Liste des Services ");
        $ListeService =  $this->managers->getManagerOf('Afficher')->ListeService();
        $this->page->addVar("ListeService", $ListeService);
    }
    public function executeDeleteClient(\Library\HTTPRequest $request)
    {
        $this->managers->getManagerOf('Afficher')->deleteClient($request->getData('id'));
        $this->app()->httpResponse()->redirect('/clients');
    }
}