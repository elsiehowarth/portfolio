// a controller for each of the urls
//they link data from a model to a view
// controllers can make a link to the html view
//the logic of the url is handled by the controller, 
//part is to get data which we find in services,
// which then returns the data back to the controller,
// which is then displayed in a view

(function () {
    "use strict";
     
    /**
     * @link https://docs.angularjs.org/guide/scope
     */
    angular.module('DogApp').
        controller('IndexController',   // controller given two params, a name and an array
            [
                '$scope',               // angular variable as a string 
                function ($scope) {
                    // add a title property which we can refer to in our view
                    $scope.title = 'Dog Project';
                }
            ]
             
        );
}());