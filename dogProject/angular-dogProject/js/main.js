//routes urls mapping them to the controller 
//and html views
//makes the link between controller and the html view

//example 
(function () {
    // turn on javascript strict syntax mode
    "use strict";
     
    angular.module("DogApp", 
      [
        'ngRoute'   // the only dependency at this stage, for routing
      ]
    ).              // chain the calling to the config with full stop
    config(
        [
          '$routeProvider',     // built in variable which injects functionality, passed as a string
          function($routeProvider) { 
              $routeProvider.
                when('/courses', {
                	//give a value which points to the html view for this url
                  templateUrl: 'js/partials/course-list.html',
                  //name controller which handles the logic need for '/courses' url
                  controller: 'CourseController'
                }).
                otherwise({
                  redirectTo: '/' // redirect to root
                });
          } 
        ]
    );  // end of config method 
}());   // end of IIFE