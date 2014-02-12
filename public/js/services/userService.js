angular.module('userService', [])

  .factory('User', function($http) {

    return {
      // get all the comments
      get : function() {
        return $http.get('/test/TestApp/public/api/users');
      },

      // get : function() {
      //   return $http.get('/test/TestApp/public/api/users' + id);
      // },

      // save a comment (pass in comment data)
      save : function(userData) {
        return $http({
          method: 'POST',
          url: '/test/TestApp/public/api/users',
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          data: $.param(userData)
        });
      },

      // destroy a comment
      destroy : function(id) {
        return $http.delete('/test/TestApp/public/api/user' + id);
      }
    }

  });
  