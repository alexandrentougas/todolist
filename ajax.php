    <fieldset>
      <legend>Test</legend>
      <?php
      $status = 0;
      $message = 'Unknown error';
      $file = 'todo.json';
      $complete = 0;
      if (isset($_POST['task'])) {
        $task = filter_var($_POST['task'], FILTER_SANITIZE_STRING);
        if (filter_var($task, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^.{0,70}$/"))) != false) {
          $current = json_decode($file, true);
          $taskObject = array('task'=>$task,'complete'=>$complete);
          // array_push($current, json_encode($taskObject));
          $new = json_encode($current);
          file_put_contents($file, $new);
          if (json_decode($new) != NULL) {
            $message = 'Task Added !';
            echo '<p id="message">' . $message . '</p>';
          } else {
            $message = 'Error : JSON file corrupted !';
            $new = json_decode($file, true);
            // array_pop($new);
            file_put_contents($file, $new);
            echo '<p id="message">' . $message . '</p>';
          }
        } else {
          $message = 'Error : entry is too long !';
          echo '<p id="message">' . $message . '</p>';
        };
      } else {
        echo 'hello';
      };
      ?>
    </fieldset>
