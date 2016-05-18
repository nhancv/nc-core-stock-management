/**
 * Created by nhancao on 5/18/16.
 */
angular.module('app.controllers', [])
    .controller('cHome', function ($scope, $timeout, $mdSidenav, $log) {
        $scope.toggleLeft = buildDelayedToggler('leftMenu');

        /**
         * Supplies a function that will continue to operate until the
         * time is up.
         */
        function debounce(func, wait, context) {
            var timer;
            return function debounced() {
                var context = $scope,
                    args = Array.prototype.slice.call(arguments);
                $timeout.cancel(timer);
                timer = $timeout(function () {
                    timer = undefined;
                    func.apply(context, args);
                }, wait || 10);
            };
        }

        /**
         * Build handler to open/close a SideNav; when animation finishes
         * report completion in console
         */
        function buildDelayedToggler(navID) {
            return debounce(function () {
                $mdSidenav(navID)
                    .toggle()
                    .then(function () {
                        $log.debug("toggle " + navID + " is done");
                    });
            }, 100);
        }

    })
    .controller('cHeader', function ($scope, $timeout, $mdSidenav, $log) {

    })
    .controller('cFooter', function ($scope, $timeout, $mdSidenav, $log) {

    })
    .controller('cBody', function ($scope, $timeout, $mdSidenav, $mdDialog, $log) {
        $scope.firstName = "John";
        $scope.lastName = "Doe";


    })
    .controller('cLeftMenu', function ($scope, $timeout, $mdSidenav, $mdDialog, $log) {
        $scope.actionClick = function (event) {
            $mdDialog.show(
                $mdDialog.alert()
                    .title('Navigating')
                    .textContent('Inspect ')
                    .ariaLabel('Person inspect demo')
                    .ok('Neat!')
                    .targetEvent(event)
            );
        };

        $scope.close = function () {
            $mdSidenav('leftMenu').close()
                .then(function () {
                    $log.debug("close LEFT is done");
                });
        };
    })

    .controller('cBlank', function ($scope) {

    })

;