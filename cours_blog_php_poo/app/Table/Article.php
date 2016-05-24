<?php

namespace App\Table;
use App\App;

class Article extends Table{

    public static function getLast() {
        return App::getDb()->query("
              SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
              FROM articles 
              LEFT JOIN categories 
              ON categorie_id = categories.id", __CLASS__);
    }

    public function getUrl() {
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExtrait() {
        $html = '<p>' . substr($this->contenu, 0, 150) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
    
}