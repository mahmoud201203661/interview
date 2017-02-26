var myApp = angular
.module("myModule", [])
.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('((');
    $interpolateProvider.endSymbol('))');
})
.controller("controller", function($scope, $http){
    var days = ["Saturday", "Sunday", "Monday", "Tuesday", "wednesday", "Thursday", "Friday"];
    $scope.days = days;
    $scope.selectedDay = 1;
    $scope.selectedDays= [];
    $scope.append = function () {
        $scope.selectedDays.push($scope.selectedDay);

    };
    $scope.sessionsPerChapter = "";
    $scope.start = "";
    var arr = "";
    $scope.send = function(){
        for(day in $scope.selectedDays){
            arr += $scope.selectedDays[day]+"-";
        }
        arr = arr.slice(0, arr.length-1);
        var month = $scope.start.getMonth()+1;
        var formDate = $scope.start.getDate()+"-"+month+"-"+$scope.start.getFullYear();
        $http({
            method: "GET",
            url: "/set?start="+formDate+"&sessionsPerChapter="+$scope.sessionsPerChapter+"&sessionDays="+arr
        }).then(function (response) {
            $scope.response = response.data;
        }, function (reason) {
            $scope.response = "error: "+reason.status;
        });
    };
});