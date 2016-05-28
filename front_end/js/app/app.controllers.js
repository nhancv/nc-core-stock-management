/**
 * Created by nhancao on 5/18/16.
 */
angular.module('app.controllers', [])
    .controller('cHome', function ($rootScope, $scope, $timeout, $mdSidenav, $log, mBase) {
        $rootScope.getTypes = function () {
            return mBase.type;
        };

        $rootScope.getBlocks = function () {
            return ['Normal', 'Block', 'Wait accept'];
        };

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

    .controller('cUser', function ($rootScope, $scope, $mdDialog, $mdEditDialog, $q, $timeout, $log, sApiCall, sUtils) {
        'use strict';


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
            order: '- create_date',
            limit: 5,
            page: 1
        };

        $scope.addUser = function (event) {
            event.stopPropagation(); // in case autoselect is enabled
            $mdDialog.show({
                clickOutsideToClose: false,
                controller: 'cUserAdd',
                controllerAs: 'ctrl',
                focusOnOpen: false,
                targetEvent: event,
                templateUrl: 'front_end/partials/dialog/user_add.html'
            }).then($scope.users);
        };

        $scope.deleteUser = function (ev) {
            var confirm = $mdDialog.confirm()
                .title('Would you like to delete this user?')
                .textContent('Think carefully!')
                .targetEvent(ev)
                .ok('Cancel')
                .cancel('Ok')
                .clickOutsideToClose(false);
            $mdDialog.show(confirm).then(function () {
                console.log('Cancel');
            }, function () {
                var form_data = {
                    uid_arr: []
                };
                angular.forEach($scope.selected, function (value, key) {
                    form_data.uid_arr.push(value.uid);
                });
                sApiCall.deleteMultiUser(form_data).then(function (results) {
                    if (results.status == 0 && results.msg) {
                        sUtils.showSimpleToast("Create user successfully!");
                        $scope.selected = [];
                        $timeout(function () {
                            $mdDialog.hide();
                            $rootScope.loadUserList();
                        }, 100);
                    } else {
                        sUtils.showSimpleToast("Have errors occur when create this user");
                    }
                });



            });
        };

        $scope.editUser = function (event, user) {
            event.stopPropagation(); // in case autoselect is enabled
            $mdDialog.show({
                clickOutsideToClose: true,
                controller: 'cUserEdit',
                controllerAs: 'ctrl',
                focusOnOpen: false,
                targetEvent: event,
                locals: {user: user},
                templateUrl: 'front_end/partials/dialog/user_edit.html'
            });
        };
        $scope.users = {};

        $scope.removeFilter = function () {
            $scope.filter.show = false;
            $scope.query.filter = '';

            if ($scope.filter.form.$dirty) {
                $scope.filter.form.$setPristine();
            }
        };

        $scope.toggleLimitOptions = function () {
            $scope.limitOptions = $scope.limitOptions ? undefined : [5, 10, 15];
        };

        $rootScope.loadUserList = function () {
            $scope.promise =
                sApiCall.getAllUser().then(function (results) {
                    $scope.users = results;
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
    .controller('cUserEdit', function (user, $mdDialog, $rootScope, $scope, $timeout, sApiCall, sUtils, mBase) {
        'use strict';
        $scope.user = angular.copy(user);
        $scope.typeSelected = mBase.type[$scope.user.type];
        $scope.getTypes = function () {
            return mBase.type;
        };

        this.cancel = $mdDialog.cancel;
        this.submit = function () {
            $scope.user.type = $scope.getTypes().indexOf($scope.typeSelected);
            if ($scope.user.password != user.password) {
                $scope.user.password = md5($scope.user.password);
            }
            sApiCall.updateUser($scope.user).then(function (results) {
                if (results.status == 0 && results.msg) {
                    sUtils.showSimpleToast("Update user successfully!");
                    $timeout(function () {
                        $mdDialog.hide();
                        $rootScope.loadUserList();
                    }, 100);
                } else {
                    sUtils.showSimpleToast("Have errors occur when update this user");
                }
            });
        }

    })
    .controller('cUserAdd', function ($mdDialog, $rootScope, $scope, $timeout, sApiCall, sUtils, mBase) {
        'use strict';

        $scope.user = angular.copy(mBase.user);
        $scope.typeSelected = mBase.type[$scope.user.type];
        $scope.getTypes = function () {
            return mBase.type;
        };

        this.cancel = $mdDialog.cancel;
        this.submit = function () {
            $scope.user.type = $scope.getTypes().indexOf($scope.typeSelected);
            $scope.user.password = md5($scope.user.password);
            sApiCall.insertUser($scope.user).then(function (results) {
                if (results.status == 0 && results.msg) {
                    sUtils.showSimpleToast("Create user successfully!");
                    $timeout(function () {
                        $mdDialog.hide();
                        $rootScope.loadUserList();
                    }, 100);
                } else {
                    sUtils.showSimpleToast("Have errors occur when create this user");
                }
            });
        }
    })

    .controller('cBlank', function ($scope) {

    })

;