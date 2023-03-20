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

        }

        public function getAllPoulet(){
            $ListPoulets = array();

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
    }
?>