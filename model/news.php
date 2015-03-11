<?php

require_once('./class/class.db.php');

class modelNews extends Database
{
    public function modelGetNews() {
        $this->query = "SELECT n.*, u.user_name
				    FROM news n
				    LEFT JOIN user u
                    ON n.author_id = u.user_id
                    ORDER BY n.id DESC
				    LIMIT 5
				    ";

        $this->result = $this->dbQuery($this->query);

        return $this->result;
    }

    public function modelGetRows()
    {
        $this->row = $this->dbFetchArray($this->result);

        return $this->row;
    }
}
?>