<?php

if(isset($_GET['news_id']))
{
    $newsEdit = new newsEdit;
    $row = $newsEdit->getOld();

    $objSmarty->assign('id', $_GET['news_id']);

        $objSmarty->assign('row', $row);

        if(isset($_POST['editNews']))
        {
            if($newsEdit->checkEmpty($_POST['title'] ,$_POST['text']))
            {
                $newsEdit->insertNewValues($_POST['title'] ,$_POST['text']);

                $objSmarty->assign('actionMessage', Debug::getMessage('Poprawnie edytowano artykuł!', 0)); //1 - blad, 0 - nie

            } else {
                $objSmarty->assign('actionMessage', Debug::getMessage('Wyszytkie pola muszą być wypełnione!', 1)); //1 - blad, 0 - nie
            }
        }

} else {
    $objSmarty->assign('actionMessage', Debug::getMessage('Brak artykułu do edycji!', 1)); //1 - blad, 0 - nie
}


class newsEdit
{

    public function __construct()
    {
        require_once('./model/action/news/edit.php');
        $this->modelEditNews = new modelEditNews;

        $this->news_id = $_GET['news_id'];
    }
    public function getOld()
    {
        return $this->modelEditNews->modelGetOld($this->news_id);
    }

    public function checkEmpty($title, $text)
    {
        if(!empty($title) AND !empty($text))
        {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function insertNewValues($title, $text)
    {
        $this->modelEditNews->modelInsertNewValues($this->news_id, $title, $text);
    }

}

?>

