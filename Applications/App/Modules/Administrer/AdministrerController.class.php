<?php

namespace Applications\App\Modules\Administrer;

class AdministrerController extends \Library\BackController
{
    public function executeIndex(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Accueil");
    }
    public function executeAddClient(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un Client");
        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->addClient($request);
            $this->app()->httpResponse()->redirect("/clients");
        }
    }
    public function executeEditClient(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Modification");

        $Client = $this->managers->getManagerOf('Afficher')->getClient($request->getData('id'));
        $this->page->addVar('client', $Client);
        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Afficher')->updateClient($request);
            $this->app()->httpResponse()->redirect("/clients");
        }
    }


    public function executeAddService(\Library\HTTPRequest $request)
    {
        $this->page->addVar("titles", "Ajouter un Service");
        if ($request->method() == 'POST') {
            $this->managers->getManagerOf('Administrer')->addService($request);
            $this->app()->httpResponse()->redirect("/services");
        }
    }
}