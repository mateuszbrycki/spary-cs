<?php
/**
 * Created by PhpStorm.
 * User: Mateusz Brycki
 * Date: 11/03/2015
 * Time: 13:11
 */

    if(isset($_POST['addNews'])) {
        $addNews = new addNews();

        if($addNews->checkEmpty($_POST['title'], $_POST['text'])) {

            $addNews->addNews($_POST['title'], $_POST['text'], $_SESSION['userId']);
            $objSmarty->assign('actionMessage', Debug::getMessage('Pomyślnie dodano sparing', 0)); //1 - blad, 0 - nie
        } else {
            $objSmarty->assign('actionMessage', Debug::getMessage('Wypełnij wszystkie pola', 1)); //1 - blad, 0 - nie
        }

    }


class addNews {
    public function __construct() {
        require_once('./model/action/news/add.php');
        $this->modelAddNews = new modeladdNews;
    }

    public function checkEmpty($title, $text) {
        if(!empty($title) AND !empty($text))
        {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function addNews($title, $date, $user_Id) {
        $this->modelAddNews->addNews($title, $date, $user_Id);
    }
}

?>