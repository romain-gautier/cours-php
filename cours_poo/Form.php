<?php

/**
 * Class Form
 * Permet de générer un formulaire simplement
 */

class Form {

    /**
     * @var array données utilisées par le formulaire
     */

    private $data;

    /**
     * @var string tag utilisé pour entourer les champs
     */

    public $surround = 'p';

    /**
     * Form constructor.
     * @param array $data données utilisées par le formulaire
     */


    public function __construct($data = array()) {
        $this->data = $data;
    }

    /**
     * @param $html code HTML à entourer
     * @return string
     */

    private function surround($html) {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    private function getValue($index) {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    public function input($name) {
         return $this->surround(
             '<input type="text" name="'. $name . '" value="' . $this->getValue($name) . '">');

    }

    public function submit() {
        return $this->surround('<button type="submit">Envoyer</button>');
    }
}