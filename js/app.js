var app = angular.module("myApp", []).filter('randomize', function () {
    return function (input, scope) {
        if (input != null && input != undefined && input > 1) {
            return Math.floor((Math.random() * input) + 1);
        }
    }
});
app.controller('myCat', function ($scope, $http) {
    $http.get('include/categoryManagement.php', {
        params: {
            "operation": "get"
        }
    }).success(function (data) {
        $scope.data = data;
    });
    $scope.onEditClick = function (e) {
        $("#" + e + "area").prop("disabled", false);
        $("#" + e + "area").toggleClass("materialize-textarea");
        $("#" + e + "area").toggleClass("white");
        $("#" + e + "area").toggleClass("black-text");
        $("#" + e + "SaveBtn").toggle();
        $("#" + e + "RemoveBtn").toggle();
        $("#" + e + "EditBtn").toggle();
    }

    $scope.onSaveClick = function (subcat, persona) {
        console.log("clicked");
        persona = $("#" + subcat + "area").val();

        $http.get('include/categoryManagement.php', {
            params: {
                "operation": "edit"
                , "subCategorySelect": subcat
                , "persona": persona
            }
        }).success(function (data) {
            console.log(data);
            if (data == "success") {
                $("#" + subcat + "area").prop("disabled", true);
                $("#" + subcat + "area").toggleClass("white");
                $("#" + subcat + "area").toggleClass("black-text");
                $("#" + subcat + "area").toggleClass("materialize-textarea");
                $("#" + subcat + "SaveBtn").toggle();
                $("#" + subcat + "RemoveBtn").toggle();
                $("#" + subcat + "EditBtn").toggle();
            } else {
                alert("there was an error");
            }
        });

    }

    $scope.onRemoveClick = function (subcat, persona) {
        $http.get('include/categoryManagement.php', {
            params: {
                "operation": "remove"
                , "subCategorySelect": subcat
                , "persona": persona
            }
        }).success(function (data) {

            if (data == "success") {
                location.reload();
            } else {
                alert("there was an error");
            }
        });
        // $("#"+e+"area").prop("disabled",true);
        // $("#"+e+"area").toggleClass( "white" );
        // $("#"+e+"area").toggleClass( "black-text" );
        // $("#"+e + "area").toggleClass( "materialize-textarea" );
        // $("#"+e + "SaveBtn").toggle();
        // $("#"+e + "RemoveBtn").toggle();
        // $("#"+e + "EditBtn").toggle();
    }


});
app.controller('catCardController', function ($scope, $http) {
    $http.get("include/getCat.php", {
        params: {
            'operation': 'getCategories'
        }
    }).success(function (data) {
        $scope.data = data;
        $scope.arr = ["teal", "orange", "grey", "red", "blue", "green", "yellow", "purple", "cyan", "amber"];
        $scope.temp = 1;
        $scope.random = function () {
            return Math.floor((Math.random() * 9) + 1);
        }
    });
});


app.controller('subcatController', function ($scope, $http) {
    $http.get("include/getCat.php", {
        params: {
            'operation': 'getCategories'
        }
    }).success(function (data) {
        $scope.data = data;
        $scope.arr = ["teal", "orange", "grey", "red", "blue", "green", "yellow", "purple", "cyan", "amber"];
        $scope.temp = 1;
        $scope.random = function () {
            return Math.floor((Math.random() * 9) + 1);
        }
    });
});