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
    .controller('cBody', function ($scope, $timeout, $mdSidenav, $mdDialog, $log) {

    })
    .controller('cUser', function ($scope, $mdEditDialog, $q, $timeout, $log) {
        'use strict';
        var tabs = [
                {
                    title: 'Home',
                    content: "<h1>Test</h1>Tabs will become paginated if there isn't enough room for them.",
                    template: "front_end/partials/p_user_tab_home.html"
                },
                {
                    title: 'Add',
                    content: "You can swipe left and right on a mobile device to change tabs.",
                    template: "front_end/partials/404.html"
                },
                {
                    title: 'Setting',
                    content: "You can bind the selected tab via the selected attribute on the md-tabs element.",
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
        $scope.addTab = function (title, view) {
            view = view || title + " Content View";
            tabs.push({title: title, content: view, disabled: false});
        };
        $scope.removeTab = function (tab) {
            var index = tabs.indexOf(tab);
            tabs.splice(index, 1);
        };

        //    table
        $scope.selected = [];
        $scope.limitOptions = [5, 10, 15];

        $scope.options = {
            rowSelection: true,
            multiSelect: true,
            autoSelect: true,
            decapitate: false,
            largeEditDialog: false,
            boundaryLinks: true,
            limitSelect: true,
            pageSelect: true
        };

        $scope.query = {
            order: 'name',
            limit: 5,
            page: 1
        };

        $scope.desserts = {
            "count": 9,
            "data": [
                {
                    "name": "Frozen yogurt",
                    "type": "Ice cream",
                    "calories": {"value": 159.0},
                    "fat": {"value": 6.0},
                    "carbs": {"value": 24.0},
                    "protein": {"value": 4.0},
                    "sodium": {"value": 87.0},
                    "calcium": {"value": 14.0},
                    "iron": {"value": 1.0}
                }, {
                    "name": "Ice cream sandwich",
                    "type": "Ice cream",
                    "calories": {"value": 237.0},
                    "fat": {"value": 9.0},
                    "carbs": {"value": 37.0},
                    "protein": {"value": 4.3},
                    "sodium": {"value": 129.0},
                    "calcium": {"value": 8.0},
                    "iron": {"value": 1.0}
                }, {
                    "name": "Eclair",
                    "type": "Pastry",
                    "calories": {"value": 262.0},
                    "fat": {"value": 16.0},
                    "carbs": {"value": 24.0},
                    "protein": {"value": 6.0},
                    "sodium": {"value": 337.0},
                    "calcium": {"value": 6.0},
                    "iron": {"value": 7.0}
                }, {
                    "name": "Cupcake",
                    "type": "Pastry",
                    "calories": {"value": 305.0},
                    "fat": {"value": 3.7},
                    "carbs": {"value": 67.0},
                    "protein": {"value": 4.3},
                    "sodium": {"value": 413.0},
                    "calcium": {"value": 3.0},
                    "iron": {"value": 8.0}
                }, {
                    "name": "Jelly bean",
                    "type": "Candy",
                    "calories": {"value": 375.0},
                    "fat": {"value": 0.0},
                    "carbs": {"value": 94.0},
                    "protein": {"value": 0.0},
                    "sodium": {"value": 50.0},
                    "calcium": {"value": 0.0},
                    "iron": {"value": 0.0}
                }, {
                    "name": "Lollipop",
                    "type": "Candy",
                    "calories": {"value": 392.0},
                    "fat": {"value": 0.2},
                    "carbs": {"value": 98.0},
                    "protein": {"value": 0.0},
                    "sodium": {"value": 38.0},
                    "calcium": {"value": 0.0},
                    "iron": {"value": 2.0}
                }, {
                    "name": "Honeycomb",
                    "type": "Other",
                    "calories": {"value": 408.0},
                    "fat": {"value": 3.2},
                    "carbs": {"value": 87.0},
                    "protein": {"value": 6.5},
                    "sodium": {"value": 562.0},
                    "calcium": {"value": 0.0},
                    "iron": {"value": 45.0}
                }, {
                    "name": "Donut",
                    "type": "Pastry",
                    "calories": {"value": 452.0},
                    "fat": {"value": 25.0},
                    "carbs": {"value": 51.0},
                    "protein": {"value": 4.9},
                    "sodium": {"value": 326.0},
                    "calcium": {"value": 2.0},
                    "iron": {"value": 22.0}
                }, {
                    "name": "KitKat",
                    "type": "Candy",
                    "calories": {"value": 518.0},
                    "fat": {"value": 26.0},
                    "carbs": {"value": 65.0},
                    "protein": {"value": 7.0},
                    "sodium": {"value": 54.0},
                    "calcium": {"value": 12.0},
                    "iron": {"value": 6.0}
                }
            ]
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
            return ['Candy', 'Ice cream', 'Other', 'Pastry'];
        };

        $scope.loadStuff = function () {
            $scope.promise = $timeout(function () {
                // loading
            }, 2000);
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
    .controller('cBlank', function ($scope) {

    })

;