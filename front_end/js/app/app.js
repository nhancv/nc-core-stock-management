/**
 * Created by nhancao on 5/18/16.
 */

angular.module('app', [
        'ngAnimate',
        'ngSanitize',
        'ngMaterial',
        'ui.router',
        'angular-loading-bar',
        'indexedDB',
        'LocalStorageModule',
        'md.data.table',
        'app.routes',
        'app.controllers',
        'app.services',
        'app.models',
        'app.directives',
        'app.filters'
    ])
    .config(function ($indexedDBProvider, mBase) {
        $indexedDBProvider
            .connection('ncIndexedDB')
            .upgradeDatabase(1, function (event, db, tx) {
                var objStore = db.createObjectStore(mBase.dbname, {keyPath: 'id'});
                //objStore.createIndex('dueDate_idx', 'dueDate', {unique: false});
            });
    })
    .config(function (localStorageServiceProvider) {
        //https://github.com/grevory/angular-local-storage
        localStorageServiceProvider
            .setPrefix('yk')
            .setStorageType('localStorage')

    })
    .config(['cfpLoadingBarProvider', function (cfpLoadingBarProvider) {
        cfpLoadingBarProvider.includeSpinner = false;
        cfpLoadingBarProvider.includeBar = true;
    }])
    .config(['$mdThemingProvider', function ($mdThemingProvider) {
        'use strict';
        $mdThemingProvider.theme('default')
            .primaryPalette('blue');
    }])
    .run(function ($rootScope, mBase) {
        $rootScope.$on(mBase.MSG.SUCCESS, function () {
            console.log("broadcast success");
        });
    })


;