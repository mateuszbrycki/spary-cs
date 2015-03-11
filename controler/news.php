<?php

    if (isset($_GET['action']) && $_SESSION['accStatus'] == 1) //sprawdzanie czy istnieje zmienna action, ktora odpowiada za podstrony podstron id->action
    {
        $objSmarty->assign('bodyaction',Router::getViewAction());
        include(Router::getControlerAction());
    }
    $news = new News();
    $news->getNews();

    while($row = $news->getRows()) {
        $results[] = $row; // dodajesz kazdy rekord do tablicy
    }

    if(isset($results))
    {
        $objSmarty->assign('rows', $results);
    } else {
        $objSmarty->assign('message', Debug::getMessage('Brak artykułów do wyświetlenia!', 1)); //1 - blad, 0 - nie
    }

class News {
    public function __construct() {
        require_once('./model/news.php');
        $this->modelNews = new modelNews;
    }

    public function getNews() {
        return $this->modelNews->modelGetNews();
    }

    public function getRows()
    {
        return $this->modelNews->modelGetRows();
    }
}
?>