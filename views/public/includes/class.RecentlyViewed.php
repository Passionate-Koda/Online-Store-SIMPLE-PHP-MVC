<?php
class RecentlyViewed{
  private $result;

  private function ToCheck($dbconn, $userID, $bookID){

    $stmt = $dbconn->prepare("SELECT * FROM recently_viewed WHERE book_id=:bk AND user_id=:ud");
    $stmt->bindParam(':bk', $bookID);
    $stmt->bindParam(':ud', $userID);
    $stmt->execute();

    return $stmt;
  }

  public function insertIntoRecentlyViewed($dbconn, $userID, $bookID){
    $chk = $this->ToCheck($dbconn, $userID, $bookID);

    $count = $chk->rowCount();

    if($count == 0){
      $stmt = $dbconn->prepare("INSERT INTO recently_viewed(book_id, user_id) VALUES(:bi,:ui)");

      $data = [
        ':bi' => $bookID,
        ':ui' => $userID
      ];

      $stmt->execute($data);
    }
  }

  public function selectFromRecentlyViewed($dbconn, $userID){
    $stmt = $dbconn->prepare("SELECT * FROM recently_viewed WHERE user_id =:ui ORDER BY view_id DESC LIMIT 4");

    $stmt->bindParam(':ui', $userID);
    $stmt->execute();

    return $stmt;
  }

  public function selectFromBook($dbconn, $bkid){
    $stmt = $dbconn->prepare("SELECT * FROM book WHERE book_id= :bi ");
    $stmt->bindParam(':bi', $bkid);
    $stmt->execute();
    return $stmt;
  }

}




?>
