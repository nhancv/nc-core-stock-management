/**
 * Created by nhancao on 5/18/16.
 */
angular.module('app.routes', [])

    // This project uses AngularUI Router which uses the concept of states
    // Learn more here: https://github.com/angular-ui/ui-router
    .config(function($stateProvider, $urlRouterProvider) {
        // For any unmatched url, send to /user
        $urlRouterProvider.otherwise("/user");

        $stateProvider
            .state('user', {
                url: "/user",
                templateUrl: "front_end/partials/p_user.html",
                controller: 'cUser'
            })
            .state('customer', {
                url: "/customer",
                templateUrl: "front_end/partials/p_customer.html",
                controller: 'cCustomer'
            })
            .state('product', {
                url: "/product",
                templateUrl: "front_end/partials/p_product.html",
                controller: 'cProduct'
            })
            .state('shipping', {
                url: "/shipping",
                templateUrl: "front_end/partials/p_shipping.html",
                controller: 'cShipping'
            })
            .state('stock', {
                url: "/stock",
                templateUrl: "front_end/partials/p_stock.html",
                controller: 'cStock'
            })
            .state('transaction', {
                url: "/transaction",
                templateUrl: "front_end/partials/p_transaction.html",
                controller: 'cTransaction'
            })
    })


;