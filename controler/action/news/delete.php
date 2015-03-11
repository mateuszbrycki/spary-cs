<?php
	if(isset($_GET['news_id']))
    {
        $newsDelete = new newsDelete;


            $objSmarty->assign('uprawnienia', TRUE);
            if(isset($_POST['tak']))
            {
                $newsDelete->newsDelete();

                header('Location: '.PAGE.'/news/lista');
            } elseif(isset($_POST['nie'])) {
                header('Location: '.PAGE.'/news/lista');
            }

    } else {

        $objSmarty->assign('actionMessage', Debug::getMessage('Brak artykulu do usunięcia!', 1)); //1 - blad, 0 - nie
    }


class newsDelete
{

    public function __construct()
    {
        require_once('./model/action/news/delete.php');
        $this->modelDeleteNews = new modelDeleteNews;

        $this->user_id = $_SESSION['userId'];
        $this->news_id = $_GET['news_id'];
    }

    public function newsDelete()
    {
        $this->modelDeleteNews->modelNewsDelete($this->news_id);
    }

}

?>