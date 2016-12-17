@extends('layouts.app')

@section('content')
        

    <div class="container">
    <p id="demo"></p>
    <p id="nemo"></p>
            <div class="content">
                <div id="todos" ng-controller="ToDoCtrl">
                    <h3 class="page-header">
                        Todos
                        <small ng-if="remaining()">({{remaining()}}) remaining</small>
                        
                    </h3>
                    <input type="text" ng-model="search">
                    <ul class="unstyled">
                        <li ng-repeat="todo in todos | filter:search">
                            <input type="checkbox" ng-model="todo.done">
                            {{ todo.text }}
                        </li>
                    </ul>
                    <h3 class="page-header">Add new</h3>
                    <form ng-submit="addNew()">
                        <input type="text" ng-model="todoText">
                        <button type="submit" class="btn btn-primary">Add New</button>
                    </form>
                </div>
                <p id="demo1">Let AJAX change this text.</p>

<button type="button"
onclick="loadDoc('ajax_info.txt', myFunction)">Change Content
</button>
            </div>
 
<script>
function loadDoc(url, cfunc) {
  var xhttp;
  xhttp=new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      cfunc(xhttp);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

function myFunction(xhttp) {
  document.getElementById("demo").innerHTML = xhttp.responseText;
}
</script>

@endsection
