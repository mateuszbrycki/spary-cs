<?php
/**
 * Created by PhpStorm.
 * User: Mateusz Brycki
 * Date: 11/03/2015
 * Time: 13:11
 */
require_once('./class/class.db.php');

class modelAddNews extends Database {

    public function addNews($title, $text, $user_id) {
        $date = date('d-m-Y, G:i ', $_SERVER['REQUEST_TIME']);
        $this->query = "INSERT INTO news (title, text, author_id, date)
						VALUES ('$title', '$text', '$user_id', '$date')";

        $this->result = $this->dbQuery($this->query);
    }

}