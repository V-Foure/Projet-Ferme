<?php
    class Poulet{

        private $id_;
        private $poids_;
        private $age_;
        private $etat_;
        private $marquage_;

        public function __construc($id,$poids,$age,$etat,$marquage){
            $this->id_ = $id;
            $this->poids_ = $poids;
            $this->age_ = $age;
            $this->etat_ = $etat;
            $this->marquage_ = $marquage;
        }

        public function setPouletById($id){
            $requestSql = "SELECT * FROM `Poulet`
                WHERE `id` = '".$id."'";
        }

        public function getAllPoulet(){
            $ListPoulets = array();

            $requestSql = "SELECT * FROM `Poulet`";
            
            $resultat = $GLOBALS["pdo"]->query($requestSql);

            while($tab=$resultat->fetch()){
                $poulet = new Poulet($tab['id'],$tab['poids'],$tab['age'],$tab['etat'],$tab['marquage']);
                array_push($ListPoulets,$poulet);
            }

            return $ListPoulets;
        }

        public function getPoids(){
            return $this->poids_;
        }

        public function getAge(){
            return $this->age_;
        }

        public function getEtat(){
            return $this->etat_;
        }

        public function getMarquage(){
            return $this->marquage_;
        }

        public function saveInBDD(){
            if(is_null($this->id_)){
                $requestSql = "INSERT INTO `Poulet` (`poids`,`age`,`etat`,`marquage`) VALUES ('".$this->poids_."','".$this->age_."','".$this->etat."','".$this->marquage_."')";

                $resultat = $GLOBALS["pdo"]->query($RequestSql);
                $this->id_ = $GLOBALS["pdo"]->lastInsertId();
            }else{
                //UPDATE
            }
        }

        public function renderHTML(){
            echo "<li>";
            echo $this->$poids_;
            echo $this->$age_;
            echo $this->$etat_;
            echo $this->$marquage_;
            echo "</li>";
        }
    }
?>