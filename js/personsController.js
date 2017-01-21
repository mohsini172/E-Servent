var app = angular.module('personHandler',[]);
app.controller('personController',function($scope,$http){
    $scope.subcat = subcat;
    $http.get("include/getCat.php",{params:{"operation":"getPersons","subcategory":$scope.subcat}}).success(function(data){
       $scope.data = data;
        console.log(data);
    });
});

app.controller('profileController',function($scope,$http){
    $scope.person = person;
    $scope.subcat = subcat;
    $http.get('include/getCat.php',{params:{"operation":"getProfile","subcategory":$scope.subcat,"person":$scope.person}}).success(function(data){
        $scope.object = data[0];
        $scope.availablility = data[1];
        $scope.appointment = data[2];
        console.log($scope.object);
        console.log($scope.availablility);
        console.log($scope.appointment);
    });
});