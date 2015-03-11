<?php

    $newsList= new newsList;
    $newsList->getNewsList();

    while($row = $newsList->getRows()) {
        $results[] = $row; // dodajesz kazdy rekord do tablicy
    }

    if(isset($results))
    {
       $objSmarty->assign('rows', $results);
    } else {
        $objSmarty->assign('actionMessage', Debug::getMessage('Brak artykułów do wyświetlenia', 1)); //1 - blad, 0 - nie
    }


class newsList
{

    public function __construct()
    {
        require_once('./model/action/news/lista.php');
        $this->modelListNews = new modelListNews;

        $this->user_id = $_SESSION['userId'];
    }
    public function getNewsList()
    {
        return $this->modelListNews->modelGetNewsList();
    }

    public function getRows()
    {
        return $this->modelListNews->modelGetRowsList();
    }

}
?>