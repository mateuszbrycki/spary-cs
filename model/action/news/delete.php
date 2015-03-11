<?php
require_once('./class/class.db.php');

class modelDeleteNews extends Database
{
    public function getUserId($news_id)
    {
        $this->query = "SELECT author_id FROM news WHERE id = '$news_id'";

        $this->result = $this->dbQuery($this->query);

        $this->row = mysql_fetch_array($this->result);

        return $this->row['author_id'];
    }

    public function modelNewsDelete($news_id)
    {

        $this->query = "DELETE FROM news WHERE id = '$news_id' LIMIT 1";

        $this->dbQuery($this->query);
    }
}


?>