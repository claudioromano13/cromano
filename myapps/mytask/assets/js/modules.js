angular.module('ToDo',[]).controller('todoController',['$scope',function($scope){

  $scope.saved = localStorage.getItem('todos');
  $scope.todos = (localStorage.getItem('todos')!==null) ? JSON.parse($scope.saved) : [];
  localStorage.setItem('todos', JSON.stringify($scope.todos));

  $scope.addTodo = function() {
    $scope.todos.push({
      text: $scope.todoText,
      done: false
    });

    $scope.todoText = ''; //clear the input after adding
    localStorage.setItem('todos', JSON.stringify($scope.todos));
  };


  $scope.remaining = function() {
    var count = 0;
    angular.forEach($scope.todos, function(todo){
      count+= todo.done ? 0 : 1;
    });
    return count;
  };

    //remove list item
    $scope.delete = function(index){
      $scope.todos.splice(index, 1);
      localStorage.setItem('todos', JSON.stringify($scope.todos));
  };

      //add list item checked
    $scope.completed = function(){
      localStorage.setItem('todos', JSON.stringify($scope.todos));
  };
}]);