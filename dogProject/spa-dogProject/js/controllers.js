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
    angular.module('DogApp')

    .directive("fileInput", function($parse){
        return{
            link: function($scope, element, attrs){
                element.on("change", function(event){
                    var files = event.target.files;
                    //console.log(files[0].name);
                    $parse(attrs.fileInput).assign($scope, element[0].files);
                    $scope.$apply();
                });
            }
        }
    }).
        controller('IndexController', 
            [
                '$scope',
                //create fuction which includes scope, dataservice, applicationData, location
                function ($scope) {
                    
                }

            ]
        ). //new controller
        controller('recentlyAddedController', 
            [
                '$scope',
                'dataService',
                'applicationData',
                '$location',
                '$anchorScroll',
                //create fuction which includes scope, dataservice, applicationData, location
                function ($scope, dataService, appData, $location, $anchorScroll) {

                    $scope.recentadverts = true;
                    $scope.buySuccess = false;
                    appData.publishInfo('advert',{});


                    //function which calls dataService to retrieve json
                    var getRecentAdverts = function () {
                            dataService.getRecentAdverts().then(  // then() is called when the promise is resolve or rejected
                                function(response){
                                    //saves advert json inside scope
                                    $scope.adverts      = response.data;
                                },
                                //if there is an error display error
                                function(err){
                                    $scope.status = 'Unable to load data ' + err;
                                },
                                function(notify){
                                    console.log(notify);
                                }
                            ); 
                        };

                        //attaches select advert to the scope and defines as function including two parameters, one the event
                        //which is the click and the other the advert id
                        $scope.selectAdvert = function ($event, advert) {
                            //pass in selectedAdvert for the second arguement
                            $scope.selectedAdvert = advert;
                            //update the path to include recentlyAdded and the id of the advert
                            $location.path('/advertDetails/' + advert.advertID);
                            //calling publishInfo then the course object
                            appData.publishInfo('advert', advert);

                            $location.hash('advert-details');

                            // call $anchorScroll()
                            $anchorScroll();
                        }


                        $scope.selectAllAdverts = function ($event) {
                            $scope.allAdverts = true;
                            $scope.recentadverts = false;
                            $scope.sellForm = false;

                            $location.hash('findADog');

                            // call $anchorScroll()
                            $anchorScroll();

                        }

                    $scope.selectSellForm = function ($event) {
                            $scope.sellForm = true;
                            $scope.allAdverts = false;
                            $scope.recentadverts = false;

                            $location.hash('addAdvert');

                            $anchorScroll();
                    }

                    $scope.selectRecentAdverts = function ($event) {
                        $scope.sellForm = false;
                        $scope.allAdverts = false;
                        $scope.recentadverts = true;

                        $location.url('/');

                        $anchorScroll();
                    }


                    getRecentAdverts();  // call the method just defined
                }

            ]
        ). //new controller
        controller('AdvertDetailsController',
            [
                '$scope', 
                'dataService', 
                '$routeParams',
                '$location',
                'applicationData',
                //create function which includes scope, dataService, routeParams, location
                function ($scope, dataService, $routeParams, $location, appData){
                    appData.publishInfo('advert',{});
                    var advertid = $routeParams.advertID;
                    //create new array and assign it to scope
                   $scope.advertDetails = [ ];
                   //function which calls dataService to retrieve json
                    var getAdvertDetails = function (advertID) {
                            dataService.getAdvertDetails(advertID).then( 
                                function(response){
                                    $scope.advertDetails      = response.data[0];
                                },
                                //if thereis an error display error
                                function(err){
                                    $scope.status = 'Unable to load data ' + err;
                                }
                            ); // end of getCourses().then
                        };

                        $scope.selectAdvert = function ($event, advert) {

                            //pass in selectedAdvert for the second arguement
                            $scope.selectedAdvert = advert;
                            //update the path to include recentlyAdded and the id of the advert
                            $location.path('/reportAdvert/' + advertid);
                            //calling publishInfo then the course object
                            appData.publishInfo('advert', advert);

                            $location.hash('report');

                        }

                         $scope.showInterestForm = function ($event, advert, showInterestForm) {
                            var element = $event.currentTarget,
                            padding = 22,
                            posY = (element.offsetTop + element.clientTop + padding) - (element.scrollTop + element.clientTop),
                            showInterestElement = document.getElementById(showInterestForm);
                            console.log(advert);
                            $scope.selectedAdvert = angular.copy(advert);
                            $scope.showInterest = true;

                            showInterestElement.style.position = 'absolute';
                            showInterestElement.style.top = posY + 'px';

                        }

                        if ($routeParams && $routeParams.advertID) {
                            getAdvertDetails($routeParams.advertID);
                        }

                }

            ]
        ).// new controller
         controller('FindDogListController',
            [
                '$scope',
                'dataService',
                'applicationData',
                '$location',
                '$anchorScroll',
                function ($scope, dataService, appData, $location, $anchorScroll) {
                     $scope.recentadverts = true;
                    appData.publishInfo('advert',{});

                    //function which calls dataService to retrieve json
                    var getAllAdverts = function () {
                            dataService.getAllAdverts().then(  // then() is called when the promise is resolve or rejected
                                function(response){
                                    //saves advert json inside scope
                                    $scope.adverts      = response.data;
                                },
                                function(err){
                                    $scope.status = 'Unable to load data ' + err;
                                },
                                function(notify){
                                    console.log(notify);
                                }
                            ); // end of getCourses().then
                    };

                    //attaches select advert to the scope and defines as function including two parameters, one the event
                    //which is the click and the other the advert id
                    $scope.selectAdvert = function ($event, advert) {
                         $location.hash('advert-details');

                        // call $anchorScroll()
                        $anchorScroll();
                        //pass in selectedAdvert for the second arguement
                        $scope.selectedAdvert = advert;
                        //update the path to include recentlyAdded and the id of the advert
                        $location.path('/advertDetails/' + advert.advertID);
                        //calling publishInfo then the course object
                        appData.publishInfo('advert', advert);
                    }


                     getAllAdverts();  // call the method just defined

                     //function which calls dataServices to retrieve json
                     var getBreeds = function () {
                            dataService.getBreeds().then(
                                function(response){
                                    $scope.breeds = response.data;
                                },
                                function(err){
                                    $scope.status = 'Unable to load data ' + err;
                                },
                                function(notify){
                                    console.log(notify);
                                }
                            );

                     };

                     getBreeds();

                     //function which calls dataServices to retrieve json
                     var getCountys = function () {
                            dataService.getCountys().then(
                                function(response){
                                    $scope.countys = response.data;
                                },
                                function(err){
                                    $scope.status = 'Unable to load data ' + err;
                                },
                                function(notify){
                                    console.log(notify);
                                }
                            );

                     };

                     getCountys();
                }

            ]
        ).
        controller('ShowInterestController',
            [
                '$scope', 
                'dataService', 
                '$routeParams',
                '$location',
                '$anchorScroll',
                '$window',
                //create function which includes scope, dataService, routeParams, location
                function ($scope, dataService, $routeParams, $location, $anchorScroll, $window){
                    
                    $scope.showInterest = function () {
                        var showInterestForm = {
                                userID: 10,
                                advertID: $scope.advertDetails.advertID,
                                title: $scope.title,
                                first_name: $scope.first_name,
                                surname: $scope.surname,
                                email: $scope.email,
                                contact_num: $scope.contact_num,
                                buying_date: $scope.buying_date,
                                new_purchase: "yes",
                                edited_purchase: "no",
                                deleted_purchase: "no"
                            };

                        console.log('First form submit with ', showInterestForm);

                        dataService.showInterest(showInterestForm).then(
                            function (response) {
                                $scope.status = response.status;
                                if(response.status === 'ok') {
                                    //reload application so the advert does not show any more
                                    $window.location.reload();
                                    //go to the confirmation page
                                    $location.url('/buyingConfirmation');
                                    //focus on the confirmation div
                                    $location.hash('Buysuccess');

                                    // jump to page content
                                    $anchorScroll();

                                }
                            },
                            function(err) {
                                $scope.status = 'Unable to load data ' + err;
                            }
                        ) 


                    };

                }

            ]
        ).
    controller('reportAdvertController',
        [
            '$scope',
            'dataService',
            '$routeParams',
            '$location',
            '$anchorScroll',
            '$window',
            //create function which includes scope, dataService, routeParams, location
            function ($scope, dataService, $routeParams, $location, $anchorScroll, $window){

                var advertID = $routeParams.advertID;

                $scope.reportAdvert = function () {
                    var reportAdvertForm = {
                        advertID: $scope.advertDetails.advertID,
                        report_type: $scope.report_type,
                        description: $scope.description,
                        date_posted: new Date(),
                    };

                    console.log('First form submit with ', reportAdvertForm);

                    dataService.reportAdvert(reportAdvertForm).then(
                        function (response) {
                            $scope.status = response.status;
                            if(response.status === 'ok') {
                                //reload application so the advert does not show any more
                                $window.location.reload();
                                //go to the confirmation page
                                $location.url('/reportSent');
                                //focus on the confirmation div
                                $location.hash('reportSuccess');

                                // jump to page content
                                $anchorScroll();

                            }
                        },
                        function(err) {
                            $scope.status = 'Unable to load data ' + err;
                        }
                    )


                };

            }

        ]
    ).
    controller('AddAdvertController',
        [
            '$scope',
            'dataService',
            '$routeParams',
            '$location',
            '$window',
            //create function which includes scope, dataService, routeParams, location
            function ($scope, dataService, $routeParams, $location, $window){

                var getCountys = function () {
                    dataService.getCountys().then(
                        function(response){
                            $scope.countys = response.data;
                        },
                        function(err){
                            $scope.status = 'Unable to load data ' + err;
                        },
                        function(notify){
                            console.log(notify);
                        }
                    );
                };

                getCountys();

                //function which calls dataServices to retrieve json
                var getBreeds = function () {
                    dataService.getBreeds().then(
                        function(response){
                            $scope.breeds = response.data;
                        },
                        function(err){
                            $scope.status = 'Unable to load data ' + err;
                        },
                        function(notify){
                            console.log(notify);
                        }
                    );

                };

                getBreeds();


                $scope.addAdvert = function ($event) {

                    var addAdvertForm = {
                        advert_title: $scope.advert_title,
                        description: $scope.description,
                        price: $scope.price,
                        dob: $scope.dob,
                        gender: $scope.gender,
                        breedID: $scope.breedID,
                        countyID: $scope.countyID,
                        start_date: new Date(),
                        userID: 10,
                        created_at: new Date(),
                        Available: 1
                    };

                    dataService.addAdvert(addAdvertForm).then(
                        function (response) {
                            $scope.status = response.status;
                            if(response.status === 'ok') {
                                $location.path('/addAdvertImage');

                            }
                        },
                        function(err) {
                            $scope.status = 'Unable to load data ' + err;
                        }
                    )


                };

            }

        ]
    ).
    controller('AddAdvertImage',
        [
            '$scope',
            'dataService',
            '$routeParams',
            '$location',
            '$window',
            //create function which includes scope, dataService, routeParams, location
            function ($scope, dataService, $routeParams, $location, $window){
                $scope.advert = [ ];

                //function which calls dataService to retrieve json
                var getAdvert = function (advertID) {
                    dataService.getAdvert(advertID).then(  // then() is called when the promise is resolve or rejected
                        function(response){
                            //saves advert json inside scope
                            $scope.advert      = response.data[0];
                        },
                        //if there is an error display error
                        function(err){
                            $scope.status = 'Unable to load data ' + err;
                        },
                        function(notify){
                            console.log(notify);
                        }
                    );
                };

                getAdvert();


                $scope.addAdvertImage = function () {

                    // var form_data = new FormData();
                    // angular.forEach($scope.image_path, function(file){
                    //     form_data.append('file', file);
                    // });

                    var addAdvertImageForm = {
                        image_path: $scope.image_path[0].name,
                        advertID: $scope.advert.advertID
                    };


                     console.log(addAdvertImageForm);

                    dataService.addAdvertImage(addAdvertImageForm).then(
                        function (response) {
                            $scope.status = response.status;
                            if(response.status === 'ok') {
                               // reload application so the advert does not show any more
                                $window.location.reload();
                                //go to the confirmation page
                                $location.url('/advertConfirmation');
                                //focus on the confirmation div
                                $location.hash('Advertsuccess');

                                // jump to page content
                                $anchorScroll();
                            }
                        },
                        function(err) {
                            $scope.status = 'Unable to load data ' + err;
                        }
                    )


                };

            }

        ]
    );

}());

