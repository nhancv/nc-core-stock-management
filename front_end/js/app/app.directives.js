/**
 * Created by nhancao on 5/18/16.
 */
angular.module('app.directives', [])
    .directive('ncBody', function () {
        return {
            restrict: 'EA',
            template: '    <div ng-include="\'front_end/partials/body.html\'" style="min-height: calc(100vh - 128px); max-height: 700px;"></div>'
        };
    })
    .directive('blankDirective', function () {

    })


;