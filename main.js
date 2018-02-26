$(function() {

$(document).ready(function() {
  $.ajax({
    url: 'todo.json',
    type: 'GET',
    dataType: 'json',
    complete: function(answer, status) {
      let tasks = JSON.parse(answer.responseText);
      displayTasks(tasks);
    }
  })
});

function addEventListenerOnTasks() {
  $('#list i').on('click', function() {
    let taskId = $(this).attr('id');
    let checkStatus;
    if ($(this).hasClass('fa-square-o')) {
      checkStatus = 0;
    } else {
      checkStatus = 1;
    };
    $.ajax({
      url:'ajax.php',
      type: 'GET',
      data: 'id=' + taskId + '&checkstatus=' + checkStatus + '&action=update',
      success: function(answer, status) {
        let tasks = JSON.parse(answer);
        $('#error').text(tasks['status']['message']);
        $('#todo, #done').text('');
        displayTasks(tasks['todolist']);
      },
      error: function(result, status, error) {
        $('#error').text('Connection error');
      }
    });
  });
};

function getValueAndSendIt() {
  let task = $('#task').val();
    $.ajax({
      url: 'ajax.php',
      type: 'POST',
      data: $('#taskForm').serialize(),
      dataType: 'html',
      success: function(answer, status) {
        let tasks = JSON.parse(answer);
        if (tasks['status']['code'] == 1000) {
          $('#error').text(tasks['status']['message']);
        } else {
          $('#error').text('Error ' + tasks['status']['code'] + ' : ' + tasks['status']['message']);
        }
        $('#todo, #done').text('');
        displayTasks(tasks['todolist']);
      },
      error: function(result, status, error) {
        $('#error').text('Connection error');
      }
    });
  };

  function displayTasks(tasks) {
    tasks.forEach(function(element) {
      if (element['complete'] == 0) {
        $('#todo').append('<div><i class="fa fa-square-o" aria-hidden="true" id="' + element['id'] + '"> ' + element['task'] + '</div>');
      } else if (element['complete'] == 1) {
        $('#done').append('<div><i class="fa fa-check-square-o" aria-hidden="true" id="' + element['id'] + '"> ' + element['task'] + '</div>');
      } else {
        console.log('JSON file corrupted !');
      };
    });
    addEventListenerOnTasks();
  };

  function displayCharsAndRestrictAdd() {
    let value = document.getElementById('task').value;
    let inputLength = value.length;
    let maxChar = document.getElementById('task').getAttribute('maxlength');
    document.getElementById('chars').innerHTML = inputLength + ' on ' + maxChar;
    if (inputLength >= maxChar) {
      document.getElementById("addTask").disabled = true;
    } else {
      document.getElementById("addTask").disabled = false;
    };
  }

  function preventSubmit() {
    event.preventDefault();
  };

  function checkEntry() {
    document.getElementById('task').addEventListener('keyup', displayCharsAndRestrictAdd);
  }

  function addEventToPreventSubmit() {
    document.getElementById('taskForm').addEventListener('submit', preventSubmit);
  };

  function addRequestEventListener() {
    document.getElementById('addTask').addEventListener('click', getValueAndSendIt);
  }

  checkEntry();
  addEventToPreventSubmit();
  addRequestEventListener();
});
