$(function() {

function getValueAndSendIt() {
  let task = $('#task').val();
    $.ajax(
    {
      url: 'ajax.php',
      type: 'POST',
      data: 'task=' + task,
      dataType : 'html',
      success: function(answer, status) {

      },
      error: function(result, status, error) {

      }
    });
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
    document.getElementById('addTask').addEventListener('click',getValueAndSendIt);
  }

  checkEntry();
  addEventToPreventSubmit();
  addRequestEventListener();
});
