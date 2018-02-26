
    <fieldset>
      <legend>Add a task</legend>
      <br>
      <form id="taskForm">
        <input type="hidden" name="action" value="creation">
        <label for="task">Task to do : </label>
        <input id="task" type="text" name="task" maxlength="70" size="80">
        <button id="addTask" type="submit" name="button">Add</button>
      </form>
      <p id="chars">0 sur 70</p>
    </fieldset>
