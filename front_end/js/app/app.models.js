/**
 * Created by nhancao on 5/18/16.
 */
/*Unit table
 years	y
 quarters	Q
 months	M
 weeks	w
 days	d
 hours	h
 minutes	m
 seconds	s
 milliseconds	ms*/
angular.module('app.models', [])
    .constant("mBase", {
        host: "http://stock.girlsdayshop.com",
        dbname: "gds",
        expireTimeout: 1,
        expireTimeoutUnit: "d",
        KEYSTORAGE: {
            EXPIRETIME: "expireTime_key"
        },

        MSG: {
            SUCCESS: "apiCallSuccess",
            ERROR: "apiCallError"
        }

    })


;