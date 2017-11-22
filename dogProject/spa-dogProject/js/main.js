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
                  //when the / is in the url then load the home page
                when('/', {

                }).//call the controller which show a specific advert based on the url passed
                when('/advertDetails/:advertID',{
                  //call specific template
                  templateUrl: 'js/partials/advertDetails.html',
                  //call controller
                  controller: 'AdvertDetailsController'
                }).//when /findADog is in the url load a template and controller
                when('/findADog', {
                  //call controller
                  controller: 'FindDogListController',
                  //call specific template
                  templateUrl: 'js/partials/findADog.html'
                }).//when /addAdvert then load template, the controller is called in the template
                when('/addAdvert', {
                  //call specific template
                  templateUrl: 'js/partials/addAdvert.html'
                }).//when /buyingConfirmation is in the url then load a template
                when('/buyingConfirmation', {
                  //call specific template
                  templateUrl: 'js/partials/buyingConfirmation.html'
                }).//when the /addAdvertImage is in the url then load a template
                when('/addAdvertImage', {
                  //call specific template
                  templateUrl: 'js/partials/addAdvertImage.html'
                }).// when the url contains /advertConfirmation then load a template
                when('/advertConfirmation', {
                  //call specific template
                  templateUrl: 'js/partials/advertConfirmation.html'
                }).//when the url contains /reportSent then load a template
                when('/reportSent', {
                  //call specific template
                  templateUrl: 'js/partials/reportSent.html'
                }).
                when('/terms', {
                  //call specific template
                  templateUrl: 'js/partials/terms.html'
                }).
                //if not on the above are in the url
                otherwise({
                  redirectTo: '/' // redirect to root
                });
          } //end function
        ]
    );  // end of config method 
}());   // end of IIFE