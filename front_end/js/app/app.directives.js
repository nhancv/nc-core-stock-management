/**
 * Created by nhancao on 5/18/16.
 */
angular.module('app.directives', [])

    .directive('blankDirective', function () {
        return {
            restrict: 'EA',
            templateUrl: 'front_end/partials/404.html'
        };
    })


;