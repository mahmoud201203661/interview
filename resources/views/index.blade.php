<?php

?>
<!DOCTYPE html>
<html ng-app = "myModule">
<head>
    <title>schedule</title>
    <script src = "{{ URL::asset('js/angular.js') }}"></script>
    <script src = "{{ URL::asset('js/script.js') }}"></script>
</head>
<body ng-controller="controller">
    <div class="container">
        <h1>Hi!</h1>
        <p>please enter data blow</p>
        <select id = "mySelect" ng-model = 'selectedDay' ng-change = 'append()'>
            <option ng-value ='$index+1' ng-repeat="day in days">((day))</option>
        </select>
        <p>Start Date: <input type='date' ng-model = "start" name = 'start'/></p>
        <p>Sessions Per Chapter: <input type="number" ng-model = "sessionsPerChapter" name = 'sessionsPerChapter' min = '1' placeholder="number"/></p>
        <ul name = 'list'>
            <li ng-repeat="d in selectedDays">((days[d-1]))</li>
        </ul>
        <input type="button" ng-click="send()" value = "submit"/>
        <div>
            ((response))
        </div>
    </div>
</body>
</html>
