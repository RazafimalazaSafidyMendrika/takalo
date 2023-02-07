<?php

class Object_model extends  CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function getObjectByClientId ($idClient)
    {
        $connector =  new PDO_Connector();
        $connection =$connector->connect();

        $object = DAO_model::selectAll($connection,"objet","idUser = $idClient");

        $connection = null;
        return $object;
    }

    public function insertObject($idUser,$nom,$prix,$photo_path)
    {
        $connector = new PDO_Connector();
        $connection = $connector->connect();

        //insertion objet
        DAO_model::insert($connection,"objet","default,$idUser,$nom,$prix");

        $lastId = DAO_model::selectAll($connection,"objet","id in (select max(id) from object)")[0]["max(id)"];

        //insertion photo
        DAO_model::insert($connection,"photos","default,$lastId,'$photo_path'");

        $connection = null;

        return $lastId;
    }

    public  function getDistinctObject($name,$categorie)
    {
        $connector = new PDO_Connector();
        $connection =$connector->connect();

        $object = DAO_model::selectAll($connection,"");

        $connection = null;

        return $object;
    }
    public  function getAllWithDetals()
    {
        $connector = new PDO_Connector();
        $connection =$connector->connect();

        $object = DAO_model::selectAll($connection,"objet_details_view");

        $connection = null;
        return $object;
    }

}