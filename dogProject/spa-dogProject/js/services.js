(function () {
'use strict';
/** Service to return the data */
 
angular.module('DogApp').
    service('applicationData',
        function ($rootScope){
            var sharedService = {};
            sharedService.info = {};

            sharedService.publishInfo = function (key, obj) {
                this.info[key] = obj;
                $rootScope.$broadcast('systemInfo_'+key, obj);
            };

            return sharedService;

        }
    ).
    service('dataService',         
        ['$q',                     // $q handles the promises
         '$http',                  // $http handles the ajax request
         //create function which call the two dependecies above
         function($q, $http) {     
 
           //variable which saves path to php file which contains sql queries needed for advert information
            var urlBase = '/dogProject/spa-dogProject/server/index.php';//?XDEBUG_SESSION_START';
        
                //method which is linked to name of controller and retrieve the adverts
                this.getRecentAdverts = function () {
                    //create a promise
                    var defer = $q.defer(),            
                        data = {
                            action: 'recent',
                            subject: 'adverts'
                        };
                    //make ajax call, include the variable which is linked to the php page and configuration object to call data
                    $http.get(urlBase, {params: data, cache: true}).
                    //if the call is successful bring back the json from the php file
                    success(function(response){
                        console.log(response);
                        defer.resolve({
                            // create data property with value from response
                            data: response.ResultSet.Result
                        });
                    }).
                    //if the call was not successful bring back error                                                
                    error(function(err){
                        defer.reject(err);
                    });
                   //return the promise
                    return defer.promise;
                };
                //method which is linked to name of controller and retrieves the adverts details based on the advertID
                this.getAdvertDetails = function (advertID) {
                    //the promise
                    var defer = $q.defer(),             
                        data = {
                            //create action property
                            action: 'list',
                            //create subject property
                            subject: 'details',
                            //create if property which passes advert id
                            id: advertID
                        };
                    //make ajax call, include the variable which is linked to the php page and configuration object to call data
                    $http.get(urlBase, {params: data, cache: true}).
                    //if the call is successful bring backk the json from the php file
                    success(function(response){
                        defer.resolve({
                            //cretaes data property with value from response
                            data: response.ResultSet.Result 
                        });
                    }).
                    //if the call was not successful bring back error
                    error(function(err){
                        defer.reject(err);
                    });
                    //return the promise
                    return defer.promise;
                };
                //method which is linked to name of controller and retrieves the all adverts
                 this.getAllAdverts = function () {
                    //the promise
                    var defer = $q.defer(),
                        data = {
                            //create action property
                            action: 'all',
                            //create subject property
                            subject: 'adverts'
                        };
                    //make ajax call, include the variable which is linked to the php page and configure object to call data 
                    $http.get(urlBase, {params: data, cache: true}).
                    //if the call is successful bring back the json from the php file
                    success(function(response){
                        defer.resolve({
                            data: response.ResultSet.Result
                        });
                    }).
                    //if the call was not successful bring back error
                    error(function(err){
                        defer.reject(err);
                    });
                   //return the promise
                    return defer.promise;
                };
                //method which is linked to name of controller and retrieves all breeds
                this.getBreeds = function () {
                    //the promise
                    var defer = $q.defer(),
                        data = {
                            //create action property
                            action: 'list',
                            //create subject property
                            subject: 'breeds'
                        };
                    //make ajax call, include the variable which is linked to the php page and configure object to call data
                    $http.get(urlBase, {params: data, cache: true}).
                    //if the cal is successful bring back the json from the php file
                    success(function(response){
                        defer.resolve({
                            data: response.ResultSet.Result 
                        });
                    }).
                    //if the call was not successful bring back error
                    error(function(err){
                        defer.reject(err);
                    });
                   // return promise
                    return defer.promise;
                };
                //method which is linked to name of controller and retrieves all countys
                this.getCountys = function () {
                    //the promise
                    var defer = $q.defer(),
                        data = {
                            //create action property
                            action: 'list',
                            //create subject property
                            subject: 'county'
                        };
                    //make ajax call, include 
                    $http.get(urlBase, {params: data, cache: true}).                          // notice the dot to start the chain to success()
                    success(function(response){
                        defer.resolve({
                            data: response.ResultSet.Result         // create data property with value from response
                        });
                    }).                                                 // another dot to chain to error()
                    error(function(err){
                        defer.reject(err);
                    });
                   
                    return defer.promise;
                };

                this.loginUser = function (user) {
                    //the promise
                    var defer = $q.defer(),             
                        data = {
                            //create action property
                            action: 'login',
                            //create subject property
                            subject: 'user',
                            //create if property which passes advert id
                            data: angular.toJson(user)
                        };
                    //make ajax call, include the variable which is linked to the php page and configuration object to call data
                    $http.post(urlBase, data).
                    //if the call is successful bring backk the json from the php file
                    success(function(response){
                        //defer.resolve(response);
                        console.log(data);
                    }).
                    //if the call was not successful bring back error
                    error(function(err){
                        defer.reject(err);
                    });
                    //return the promise
                    return defer.promise;
                };

                //  this.register = function (registerUser) {
                //     //the promise
                //     var defer = $q.defer(),             
                //         data = {
                //             //create action property
                //             action: 'insert',
                //             //create subject property
                //             subject: 'user',
                //             //create if property which passes advert id
                //             id: angular.toJson(registerUser)
                //         };
                //     //make ajax call, include the variable which is linked to the php page and configuration object to call data
                //     $http.post(urlBase, data).
                //     //if the call is successful bring backk the json from the php file
                //     success(function(response){
                //         //defer.resolve(response);
                //         console.log(data);
                //     }).
                //     //if the call was not successful bring back error
                //     error(function(err){
                //         defer.reject(err);
                //     });
                //     //return the promise
                //     return defer.promise;
                // };

                  this.showInterest = function (showInterestForm) {
                    //the promise
                    var defer = $q.defer(),             
                        data = {
                            XDEBUG_SESSION_START: true,
                            //create action property
                            action: 'insert',
                            //create subject property
                            subject: 'buyer',

                            data: angular.toJson(showInterestForm)
                        };
                    //make ajax call, include the variable which is linked to the php page and configuration object to call data
                    $http.post(urlBase, data).
                    //if the call is successful bring backk the json from the php file
                    success(function(response){
                        console.log(response);
                        defer.resolve(response);
                    }).
                    //if the call was not successful bring back error
                    error(function(err){
                        defer.reject(err);
                    });
                    //return the promise
                    return defer.promise;
                };

             this.reportAdvert = function (reportAdvertForm) {
                 //the promise
                 var defer = $q.defer(),
                     data = {
                         XDEBUG_SESSION_START: true,
                         //create action property
                         action: 'report',
                         //create subject property
                         subject: 'advert',
                         //create data property to store the form data
                         data: angular.toJson(reportAdvertForm),

                     };
                 //make ajax call, include the variable which is linked to the php page and configuration object to call data
                 $http.post(urlBase, data).
                 //if the call is successful bring backk the json from the php file
                 success(function(response){
                     defer.resolve(response);
                 }).
                 //if the call was not successful bring back error
                 error(function(err){
                     defer.reject(err);
                 });
                 //return the promise
                 return defer.promise;
             };

             this.addAdvert = function (addAdvertForm) {
                 //the promise
                 var defer = $q.defer(),
                     data = {
                         XDEBUG_SESSION_START: true,
                         //create action property
                         action: 'insert',
                         //create subject property
                         subject: 'advert',
                         //create if property which passes advert id
                         data: angular.toJson(addAdvertForm)
                     };
                 //make ajax call, include the variable which is linked to the php page and configuration object to call data
                 $http.post(urlBase, data).
                 //if the call is successful bring backk the json from the php file
                 success(function(response){
                     defer.resolve(response);
                 }).
                 //if the call was not successful bring back error
                 error(function(err){
                     //defer.reject(err);
                     console.log(data);
                 });
                 //return the promise
                 return defer.promise;
             };

             this.getAdvert = function () {
                 //the promise
                 var defer = $q.defer(),
                     data = {
                         XDEBUG_SESSION_START: true,
                         //create action property
                         action: 'select',
                         //create subject property
                         subject: 'advert'
                     };
                 //make ajax call, include the variable which is linked to the php page and configuration object to call data
                 $http.get(urlBase, {params: data, cache: true}).
                 //if the call is successful bring back the json from the php file
                 success(function(response){
                     console.log(response);
                     defer.resolve({
                         // create data property with value from response
                         data: response.ResultSet.Result
                     });
                 }).
                 //if the call was not successful bring back error
                 error(function(err){
                     defer.reject(err);
                 });
                 //return the promise
                 return defer.promise;
             };

             this.addAdvertImage = function (addAdvertImageForm) {
                 //the promise
                 var defer = $q.defer(),
                     data = {
                         XDEBUG_SESSION_START: true,
                         //create action property
                         action: 'insert',
                         //create subject property
                         subject: 'image',
                         //create if property which passes advert id
                         data: angular.toJson(addAdvertImageForm)
                     };
                 //make ajax call, include the variable which is linked to the php page and configuration object to call data
                 $http.post(urlBase, data).
                 //if the call is successful bring backk the json from the php file
                 success(function(response){
                     defer.resolve(response);
                 }).
                 //if the call was not successful bring back error
                 error(function(err){
                     //defer.reject(err);
                     console.log(data);
                 });
                 //return the promise
                 return defer.promise;
             };
 
         }
        ]
    );
}());