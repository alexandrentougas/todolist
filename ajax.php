<?php
  $codeStatus = 1418;
  $message = 'Unknown error';
  $file = 'todo.json';
  $complete = 0;
  $current = file_get_contents($file);
  $json_data = json_decode($current, true);
  if (!isset($_POST['task'])){
    $_POST['task'] = '';
  }
  if (isset($_POST['task']) || isset($_GET['id'])) {
    if ($_POST['task'] != '' && $_POST['action'] == 'creation') {
      $task = filter_var($_POST['task'], FILTER_SANITIZE_STRING);
      if (filter_var($task, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^.{0,70}$/"))) != false) {
        $taskObject = array('id'=>date_timestamp_get(date_create()),'task'=>$task,'complete'=>$complete);
        array_push($json_data, $taskObject);
        $new = json_encode($json_data, JSON_PRETTY_PRINT);
        if (file_put_contents($file, $new) != false) {
          $message = 'Task Added !';
          $codeStatus = 1000;
        } else {
          $message = 'task not added !';
          $codeStatus = 1001;
        }
      } else {
        $message = 'entry is too long !';
        $codeStatus = 1001;
      }
    } elseif($_GET['action'] == 'update' && $_GET['id'] != '' && $_GET['checkstatus'] != '') {
      $taskKey = array_search($_GET['id'], array_column($json_data, 'id'));
      $json_data[$taskKey]['complete'] = ($_GET['checkstatus'] == 0) ? 1 : 0;
      $message = 'Updated';
      $codeStatus = 1002;
      $new = json_encode($json_data, JSON_PRETTY_PRINT);
      file_put_contents($file, $new);
    } else {
      $message = 'please type something !';
      $codeStatus = 1001;
    }
  } else {
    $message = 'access denied !';
    $codeStatus = 1001;
  }
  $json_answer['status']['code'] = $codeStatus;
  $json_answer['status']['message'] = $message;
  $json_answer['todolist']= $json_data;
  echo json_encode($json_answer);
?>
