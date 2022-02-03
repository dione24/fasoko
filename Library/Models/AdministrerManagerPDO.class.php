<?php

namespace Library\Models;



class AdministrerManagerPDO extends \Library\Models\AdministrerManager
{
    public function addClient()
    {
        $requete = $this->dao->prepare("INSERT INTO clients(nom,prenom,telephone,adresse,email) VALUES(:nom,:prenom,:telephone,:adresse,:email)");
        $requete->bindValue(':nom', $_POST['nom'], \PDO::PARAM_STR);
        $requete->bindValue(':prenom', $_POST['prenom'], \PDO::PARAM_STR);
        $requete->bindValue(':telephone', $_POST['telephone'], \PDO::PARAM_STR);
        $requete->bindValue(':adresse', $_POST['adresse'], \PDO::PARAM_STR);
        $requete->bindValue(':email', $_POST['email'], \PDO::PARAM_STR);
        $requete->execute();
    }

    public function addService()
    {
        $requete = $this->dao->prepare("INSERT INTO services(nomService) VALUES(:nomService)");
        $requete->bindValue(':nomService', $_POST['nomService'], \PDO::PARAM_STR);
        $requete->execute();
    }


    public function addAb()
    {
        $requete = $this->dao->prepare("INSERT INTO abonnements(RefClient,RefService,DateM,Duree,note) VALUES(:RefClient,:RefService,:DateM,:Duree,:note)");
        $requete->bindValue(':RefClient', $_POST['RefClient'], \PDO::PARAM_STR);
        $requete->bindValue(':RefService', $_POST['RefService'], \PDO::PARAM_STR);
        $requete->bindValue(':DateM', $_POST['DateM'], \PDO::PARAM_STR);
        $requete->bindValue(':Duree', $_POST['Duree'], \PDO::PARAM_STR);
        $requete->bindValue(':note', $_POST['note'], \PDO::PARAM_STR);
        $requete->execute();

        $this->SendWelcomeMessage($_POST['RefClient'], $_POST['RefService'], $_POST['DateM'], $_POST['Duree']);
    }


    public function SendWelcomeMessage($RefClient, $RefService, $dateM, $duree)
    {
        $datePlusDuration = date('Y-m-d', strtotime(" +" . $duree . " month ", strtotime($dateM)));
        $requete = $this->dao->prepare("SELECT * FROM clients WHERE id = :RefClient");
        $requete->bindValue(':RefClient', $RefClient, \PDO::PARAM_INT);
        $requete->execute();
        $client = $requete->fetch();

        $query = $this->dao->prepare("SELECT * FROM services WHERE RefServices = :RefService");
        $query->bindValue(':RefService', $RefService, \PDO::PARAM_INT);
        $query->execute();
        $service = $query->fetch();

        $to = $client['telephone'];
        $subject = "\n
        Bonjour " . $client['prenom'] . " " . $client['nom'] . ", votre abonnement " . $service['nomService'] . " a été activé avec succès.\n
        Date de Mise en ligne : " . $dateM . ".
        Durée de l'abonnement : " . $duree . " mois.
        Date d’expiration : " . $datePlusDuration . ".\n
        LOLY IPTV vous remercie.
        ";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/instance2323/messages/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "token=cuk59kybx5egbz72&to=$to&body=$subject&priority=1&referenceId=",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            echo $response;
        }
    }










    public function SendMessage($to, $subject)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ultramsg.com/instance2323/messages/chat",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "token=cuk59kybx5egbz72&to=$to&body=$subject&priority=1&referenceId=",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

            echo $response;
        }
    }
}