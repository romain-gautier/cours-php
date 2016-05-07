<?php

class BootstrapForm extends Form {


    /**
     * @param $html code HTML à entourer
     * @return string
     */

    protected function surround($html) {
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param $name
     * @return string
     */

    public function input($name) {
        return $this->surround(
            '<label>' . $name . '</label>' . '<input type="text" name="'. $name . '" value="' . $this->getValue($name) . '" class="form-control"');

    }

    public function submit() {
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }

}