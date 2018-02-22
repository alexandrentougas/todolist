<?php
if (isset($_POST['task'])) {
  $task = filter_var($_POST['task'], FILTER_SANITIZE_STRING);
  if (filter_var($task, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^.{0,70}$/"))) != false) {
    echo '<br>Task added !';
  };
};
?>
