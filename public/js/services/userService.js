angular.module('userService', [])

  .factory('User', function($http) {

    return {
      get : function() {
        return $http.get('/test/TestApp/public/api/users');
      },

      save : function(userData) {
        return $http({
          method: 'POST',
          url: '/test/TestApp/public/api/users',
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          data: $.param(userData)
        });
      },

      destroy : function(id) {
        return $http.delete('/test/TestApp/public/api/user' + id);
      }
    }

  });
  