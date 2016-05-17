/**
 * Created by nhancao on 5/18/16.
 */
angular.module('app.routes', [])

    // This project uses AngularUI Router which uses the concept of states
    // Learn more here: https://github.com/angular-ui/ui-router
    .config(function($stateProvider, $urlRouterProvider) {
        //
        // For any unmatched url, redirect to /state1
        $urlRouterProvider.otherwise("/state1");
        //
        // Now set up the states
        $stateProvider
            .state('state1', {
                url: "/state1",
                templateUrl: "front_end/partials/state1.html"
            })
            .state('state1.list', {
                url: "/list",
                templateUrl: "front_end/partials/state1.list.html",
                controller: function($scope) {
                    $scope.items = ["A", "List", "Of", "Items"];
                }
            })
            .state('state2', {
                url: "/state2",
                templateUrl: "front_end/partials/state2.html"
            })
            .state('state2.list', {
                url: "/list",
                templateUrl: "front_end/partials/state2.list.html",
                controller: function($scope) {
                    $scope.things = ["A", "Set", "Of", "Things"];
                }
            })
        //Multiple & name views
            .state('index', {
                url: "",
                views: {
                    "viewA": { template: "index.viewA" },
                    "viewB": { template: "index.viewB" }
                }
            })
            .state('route1', {
                url: "/route1",
                views: {
                    "viewA": { template: "route1.viewA" },
                    "viewB": { template: "route1.viewB" }
                }
            })
            .state('route2', {
                url: "/route2",
                views: {
                    "viewA": { template: "route2.viewA" },
                    "viewB": { template: "route2.viewB" }
                }
            })



        ;
    })


;