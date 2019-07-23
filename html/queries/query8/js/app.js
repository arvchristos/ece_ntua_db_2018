var fetch = angular.module('myapp', ['angularUtils.directives.dirPagination']);

fetch.controller('userCtrl', ['$scope', '$http', function ($scope, $http) {
  $scope.sort = function(keyname){
    $scope.sortKey = keyname;   //set the sortKey to the param passed
    $scope.reverse = !$scope.reverse; //if true make it false and vice versa
  }
 $http({
  method: 'get',
  url: _databasefile
 }).then(function successCallback(response) {
  // Store response data
  $scope.queries = response.data;
 });
}]);
