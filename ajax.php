<?php
  $status = 0;
  $message = 'Unknown error';
  $file = 'todo.json';
  if (isset($_POST['task'])) {
    $task = filter_var($_POST['task'], FILTER_SANITIZE_STRING);
    if (filter_var($task, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^.{0,70}$/"))) != false) {
      $current = json_decode($file, true);
      array_push($current, $task);
      json_encode($current);
    } else {
      $message = 'Error : entry is too long !';
    };
  };
?>
