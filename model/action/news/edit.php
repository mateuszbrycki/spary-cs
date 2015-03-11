<?php

require_once('./class/class.db.php');

class modelEditNews extends Database
{
    public function modelGetOld($id)
    {
        $this->query = "SELECT title, text, id
                        FROM news
                        WHERE id = '$id'";

        $this->result = $this->dbQuery($this->query);
        $this->row = mysql_fetch_array($this->result);

        return $this->row;
    }

    public function modelInsertNewValues($news_id, $title, $text)
    {

        $date = date('d-m-Y, G:i ', $_SERVER['REQUEST_TIME']);
        $this->query = "UPDATE news
                        SET    title = '$title',
                            text = '$text',
                            date = '$date'
						WHERE id = '$news_id'";

        $this->result = $this->dbQuery($this->query);
        $this->dbQuery($this->query);
    }
}

?>