<?php

require_once('./class/class.db.php');

class modelListNews extends Database
{
    public function modelGetNewsList()
    {
        $this->query = "SELECT n.id, n.title, n.date, u.user_name
						FROM news n
					    JOIN user u ON u.user_id = n.author_id";

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