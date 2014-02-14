angular.module('userService', [])

  .factory('User', function($http) {

    return {
      get : function() {
        return $http.get('/TestApp/public/api/users');
      },

      save : function(userData) {
        return $http({
          method: 'POST',
          url: '/TestApp/public/api/users',
          headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
          data: $.param(userData)
        });
      },

      destroy : function(id) {
        return $http.delete('/TestApp/public/api/user' + id);
      }
    }

  });
  