<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chat App</title>

  <!-- CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
  <style>
    body    { padding-top:30px; }
    form    { padding-bottom:20px; }
    .comment  { padding-bottom:20px; }
  </style>

  <!-- JS -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

  <!-- ANGULAR -->
  <!-- all angular resources will be loaded from the /public folder -->
    <script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
    <script src="js/services/commentService.js"></script> <!-- load our service -->
    <script src="js/services/userService.js"></script> <!-- load our service -->
    <script src="js/app.js"></script> <!-- load our application -->

</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="commentApp" ng-controller="mainController">
<div class="col-md-8 col-md-offset-2">
  <div>Users:</div>
  <div ng-hide="loading" ng-repeat="user in users">
    <h3>User: {{ user.name }}</h3>
    <p>{{ user.email }}</p>

  </div>
  <div ng-hide="userLogin" >
  <form ng-submit="submitLogin()"> <!-- ng-submit will disable the default form action and use our function -->

    <!-- AUTHOR -->
    <div class="form-group">
      <input type="text" class="form-control input-sm" name="name" ng-model="userData.name" placeholder="Name">
    </div>

    <!-- COMMENT TEXT -->
    <div class="form-group">
      <!-- <input type="text" class="form-control input-sm" name="password" ng-model="userData.password" placeholder="password"> -->
    </div>
    
    <!-- SUBMIT BUTTON -->
    <div class="form-group text-right"> 
      <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </div>
  </form>
  </div>
  <div ng-show="userLogin">
    <form ng-submit="submitLogout()">
      <button type="submit" class="btn btn-primary btn-lg">Logout</button>
    </form>
    
  </div>

  <!-- PAGE TITLE =============================================== -->
  <div ng-show="userLogin">
  <div class="page-header">
    <h2>Chat App</h2>
    <h4>Leave a Comment</h4>
  </div>

  <!-- NEW COMMENT FORM =============================================== -->
  <div  >
    <form ng-submit="submitComment()" > <!-- ng-submit will disable the default form action and use our function -->

      <!-- AUTHOR -->
      <div class="form-group">
        <div>{{authorName}}</div>
      </div>

      <input type="hidden" ng-model="commentData.author" ng-init="commentData.author='Tyler'" >

      <!-- COMMENT TEXT -->
      <div class="form-group">
        <input type="text" class="form-control input-lg" name="comment" ng-model="commentData.text" placeholder="Say what you have to say">
      </div>
      
      <!-- SUBMIT BUTTON -->
      <div class="form-group text-right"> 
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
      </div>
    </form>
  </div>

  <!-- LOADING ICON =============================================== -->
  <!-- show loading icon if the loading variable is set to true -->
  <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

  <!-- THE COMMENTS =============================================== -->
  <!-- hide these comments if the loading variable is true -->
  <div class="comment" ng-hide="loading" ng-repeat="comment in comments">
    <h3>Comment #{{ comment.id }} <small>by {{ comment.author }}</h3>
    <p>{{ comment.text }}</p>

    <p><a href="#" ng-click="deleteComment(comment.id)" class="text-muted">Delete</a></p>
  </div>
  </div>

</div>
</body>
</html>
