<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style media="screen">
    #todo, #done {
      min-height: 20px;
    }
    #todo div, #done div {
      min-height: 20px;
      cursor: move;
      cursor: grab;
      cursor: -moz-grab;
      cursor: -webkit-grab;
    }
    #todo div:active, #done div:active {
      cursor: grabbing;
      cursor: -moz-grabbing;
      cursor: -webkit-grabbing;
    }
    .gu-mirror {
      position: fixed !important;
      margin: 0 !important;
      z-index: 9999 !important;
      opacity: 0.8;
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
      filter: alpha(opacity=80);
      }
    .gu-hide {
      display: none !important;
      }
    .gu-unselectable {
      -webkit-user-select: none !important;
      -moz-user-select: none !important;
      -ms-user-select: none !important;
      user-select: none !important;
      }
    .gu-transit {
      opacity: 0.2;
      -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
      filter: alpha(opacity=20);
    }
    </style>
  </head>
  <body>
    <fieldset id="list">
      <legend>To Do List</legend>
      <div>
        <h3>To Do</h3>
        <form id="todo">

        </form>
      </div>
      <div>
        <h3>Done</h3>
        <form id="done">

        </form>
      </div>
    </fieldset>
    <br>
    <?php
      include 'form.php';
    ?>
    <div id="error"></div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js'></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
    <script src="main.js" type="text/javascript"></script>
  </body>
</html>
