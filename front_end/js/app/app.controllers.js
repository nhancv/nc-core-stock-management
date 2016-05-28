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
    .controller('cLeftMenu', function ($scope, $timeout, $mdSidenav, $mdDialog, $log) {

        $scope.close = function () {
            $mdSidenav('leftMenu').close()
                .then(function () {
                    $log.debug("close LEFT is done");
                });
        };
    })
    .controller('cBody', function ($scope, $timeout, $mdSidenav, $mdDialog, $log, sApiCall) {

    })

    .controller('cUser', function ($rootScope, $scope, $mdDialog, $mdEditDialog, $q, $timeout, $log, sApiCall) {
        'use strict';


        var newUser = {
            "uid": "3",
            "pid": "admin4",
            "password": "1",
            "name": "Nhan Cao",
            "phone": null,
            "address": null,
            "type": "0",
            "block": "0",
            "create_date": "2016-05-10 00:45:46",
            "update_date": "2016-05-10 00:45:46",
            "author": "Nhan"
        };

        //sApiCall.insertUser(newUser).then(function (results) {
        //    console.log(results);
        //});
        //sApiCall.updateUser(newUser).then(function (results) {
        //    console.log(results);
        //});
        //sApiCall.deleteUser(newUser).then(function (results) {
        //    console.log(results);
        //});

        var tabs = [
                {
                    title: 'Home',
                    content: "<h3>All Users</h3>List all users, you can delete, edit and add new user",
                    template: "front_end/partials/p_user_tab_home.html"
                },
                {
                    title: 'Add',
                    content: "<h3>Reprehenderit</h3>Reprehenderit ex, feugiat, mollit ultrices. Semper in illum parturient, purus laboris imperdiet quae rerum rem senectus aspernatur hymenaeos viverra integer.",
                    template: "front_end/partials/404.html"
                },
                {
                    title: 'Setting',
                    content: "<h3>Maecenas</h3>Maecenas optio cursus laboris, ex felis et faucibus perferendis officiis? Platea pulvinar ridiculus exercitation! Quibusdam! Montes, semper blanditiis corporis blandit.",
                    template: "front_end/partials/404.html"
                }
            ],
            selected = null,
            previous = null;
        $scope.tabs = tabs;
        $scope.selectedIndex = 0;
        $scope.$watch('selectedIndex', function (current, old) {
            previous = selected;
            selected = tabs[current];
            if (old + 1 && (old != current)) $log.debug('Goodbye ' + previous.title + '!');
            if (current + 1)                $log.debug('Hello ' + selected.title + '!');
        });

        //    table
        $scope.selected = [];
        $scope.limitOptions = [5, 10, 15, {
            label: 'All',
            value: function () {
                return $scope.users ? $scope.users.count : 0;
            }
        }];


        $scope.options = {
            rowSelection: true,
            multiSelect: true,
            autoSelect: false,
            decapitate: false,
            largeEditDialog: false,
            boundaryLinks: true,
            limitSelect: true,
            pageSelect: true
        };
        $rootScope.filter = {
            options: {
                updateOn: 'keyup change click blur',
                debounce: {
                    keyup: 10, click: 0, change: 10, blur: 10
                }
            }
        };
        $scope.query = {
            filter: '',
            order: 'nameToLower',
            limit: 5,
            page: 1
        };
        $scope.addItem = function (event) {
            $mdDialog.show({
                clickOutsideToClose: true,
                controller: 'addItemController',
                controllerAs: 'ctrl',
                focusOnOpen: false,
                targetEvent: event,
                templateUrl: 'front_end/partials/add-item-dialog.html',
            }).then($scope.users);
        };

        $scope.delete = function (event) {
            $mdDialog.show({
                clickOutsideToClose: true,
                controller: 'deleteController',
                controllerAs: 'ctrl',
                focusOnOpen: false,
                targetEvent: event,
                locals: {users: $scope.selected},
                templateUrl: 'front_end/partials/delete-dialog.html',
            }).then($scope.users);
        };
        $scope.users = {};

        $scope.removeFilter = function () {
            $scope.filter.show = false;
            $scope.query.filter = '';

            if ($scope.filter.form.$dirty) {
                $scope.filter.form.$setPristine();
            }
        };

        $scope.editComment = function (event, dessert) {
            event.stopPropagation(); // in case autoselect is enabled

            var editDialog = {
                modelValue: dessert.comment,
                placeholder: 'Add a comment',
                save: function (input) {
                    if (input.$modelValue === 'Donald Trump') {
                        input.$invalid = true;
                        return $q.reject();
                    }
                    if (input.$modelValue === 'Bernie Sanders') {
                        return dessert.comment = 'FEEL THE BERN!'
                    }
                    dessert.comment = input.$modelValue;
                },
                targetEvent: event,
                title: 'Add a comment',
                validators: {
                    'md-maxlength': 30
                }
            };

            var promise;

            if ($scope.options.largeEditDialog) {
                promise = $mdEditDialog.large(editDialog);
            } else {
                promise = $mdEditDialog.small(editDialog);
            }

            promise.then(function (ctrl) {
                var input = ctrl.getInput();

                input.$viewChangeListeners.push(function () {
                    input.$setValidity('test', input.$modelValue !== 'test');
                });
            });
        };

        $scope.toggleLimitOptions = function () {
            $scope.limitOptions = $scope.limitOptions ? undefined : [5, 10, 15];
        };

        $scope.getTypes = function () {
            return ['Owner', 'Assistant', 'Partner', 'Shipper'];
        };

        $scope.getBlocks = function () {
            return ['Normal', 'Block', 'Wait accept'];
        };

        $scope.loadUserList = function () {
            $scope.promise =
                sApiCall.getAllUser().then(function (results) {
                    $scope.users = results;
                    console.log($scope.users);
                });
        };

        $scope.logItem = function (item) {
            console.log(item.name, 'was selected');
        };

        $scope.logOrder = function (order) {
            console.log('order: ', order);
        };

        $scope.logPagination = function (page, limit) {
            console.log('page: ', page);
            console.log('limit: ', limit);
        }

    })
    .controller('deleteController', function (users, $mdDialog, $scope, $q) {
        'use strict';

        this.cancel = $mdDialog.cancel;

        function deleteDessert(dessert, index) {
            var deferred = $nutrition.users.remove({id: dessert._id});

            deferred.$promise.then(function () {
                users.splice(index, 1);
            });

            return deferred.$promise;
        }

        function onComplete() {
            $mdDialog.hide();
        }

        function error() {
            $scope.error = 'Invalid secret.';
        }

        function success() {
            $q.all(users.forEach(deleteDessert)).then(onComplete);
        }

        this.authorizeUser = function () {
            $authorize.get({secret: $scope.authorize.secret}, success, error);
        };

    })
    .controller('addItemController', function ($mdDialog, $scope) {
        'use strict';

        this.cancel = $mdDialog.cancel;

        function success(dessert) {
            $mdDialog.hide(dessert);
        }

        this.addItem = function () {
            $scope.item.form.$setSubmitted();

            if ($scope.item.form.$valid) {
                $nutrition.users.save({dessert: $scope.dessert}, success);
            }
        };

    })

    .controller('cBlank', function ($scope) {

    })

;