<?php

class Pagination{
  private $page;
  private $bookPerpage = 2;
  private $offset;
  private $totalPages;


  public function query($dbconn, $catid, $page){
    $page = $this->page;
    $this->offset =($this->page - 1) * $this-> bookPerPage;

    $stmt = $dbconn->prepare("SELECT * FROM book WHERE category_id=:id LIMIT $this->offset, $this->bookPerPage");

    $stmt->bindParam(':id', $catid);

    $stmt->execute();
    return $stmt;
  }

  public function all($dbconn, $catid){
    $stmt = $dbconn->prepare("SELECT * FROM book WHERE category_id= :id");

    $stmt->bindParam(':id', $catid);
    $stmt->execute();

    $count = $stmt->rowCount();

    $this->totalPages = ceil($count/$this->bookPerpage);

    return$this->totalPages;
  }

  public function getStart($start){
    $this->offset = ($this->page -1) * $this->bookPerPage;
  }

  public function currentPage($offset){
    return ($offset/$this->page) + 1;
  }
}


?>
