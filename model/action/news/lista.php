<?php

require_once('./class/class.db.php');

class modelListNews extends Database
{
    public function modelGetNewsList()
    {
        $this->query = "SELECT n.id, n.title, n.text, n.date, u.user_name
						FROM news n
					    JOIN user u ON n.author_id = u.user_id";

        $this->result = $this->dbQuery($this->query);
        return $this->result;
    }

    public function modelGetRowsList()
    {
        $this->row = $this->dbFetchArray($this->result);
        return $this->row;
    }
}
?>