<?php
require_once 'db.php';

$offset = $_POST['offset'];

$select = "SELECT * FROM `posts` LIMIT 5 OFFSET ?";
$query = $connect->prepare($select);
$query->bind_param('i', $offset);
$query->execute();
$result = $query->get_result();
$allposts = array();
foreach ($result as $single) {
  extract($single);
  $each = array(
    "id" => $id,
    "post" => $post,
    "date" => $date
  );
  array_push($allposts, $each);
  //  print_r($single);
  //  echo "<br/>";
}
echo json_encode($allposts);
