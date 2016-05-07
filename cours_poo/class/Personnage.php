<?php
    class Personnage{
        protected $vie = 80;
        protected $atk = 20;
        protected $nom;

        const MAX_VIE = 100;

        public function getNom() {
            return $this->nom;
        }

        public function getVie() {
            return $this->vie;
        }

        public function getAtk() {
            return $this->atk;
        }

        public function setNom($nom) {
            $this->nom = $nom;
        }

        public function setVie($vie) {
            $this->vie = $vie;
        }

        public function setAtk($atk) {
            $this->atk = $atk;
        }

        public function crier() {
            echo 'LEEEEEEEROY JENKINSSSSS!!!';
        }

        public function regenerer($vie = null) {
            if (is_null($vie)) {
                $this->vie = self::MAX_VIE;
            } else {
                $this->vie += $vie;
            }
        }

        public function __construct($nom) {
            $this->nom = $nom;
        }

        public function attaque($cible) {
            $cible->vie -= $this->atk;
        }

        public function mort() {
            return $this->vie <= 0;
        }

    }