/**
 * Created by nhancao on 5/18/16.
 */
angular.module('app.routes', [])

    // This project uses AngularUI Router which uses the concept of states
    // Learn more here: https://github.com/angular-ui/ui-router
    .config(function($stateProvider, $urlRouterProvider) {
        // For any unmatched url, send to /route1
        $urlRouterProvider.otherwise("/route1");

        $stateProvider
            .state('route1', {
                url: "/route1",
                templateUrl: "front_end/partials/state1.html"
            })
            .state('route1.list', {
                url: "/list",
                templateUrl: "front_end/partials/state1.list.html",
                controller: function ($scope) {
                    $scope.items = ["A", "List", "Of", "Items"];
                }
            })

            .state('route2', {
                url: "/route2",
                templateUrl: "front_end/partials/state2.html"
            })
            .state('route2.list', {
                url: "/list",
                templateUrl: "front_end/partials/state2.list.html",
                controller: function ($scope) {
                    $scope.things = ["A", "Set", "Of", "Things"];
                }
            })
    })


;