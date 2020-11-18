<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Account
    |--------------------------------------------------------------------------
    |
    | This is the default account to be used when none is specified.
    */

    'default' => 'staging',

    /*
    |--------------------------------------------------------------------------
    | Native File Cache Location
    |--------------------------------------------------------------------------
    |
    | When using the Native Cache driver, this will be the relative directory
    | where the cache information will be stored.
    */

    'cache_location' => '../cache',

    /*
    |--------------------------------------------------------------------------
    | Accounts
    |--------------------------------------------------------------------------
    |
    | These are the accounts that can be used with the package. You can configure
    | as many as needed. Two have been setup for you.
    |
    | Sandbox: Determines whether to use the sandbox, Possible values: sandbox | production
    | Initiator: This is the username used to authenticate the transaction request
    | LNMO:
    |    paybill: Your paybill number
    |    shortcode: Your business shortcode
    |    passkey: The passkey for the paybill number
    |    callback: Endpoint that will be be queried on completion or failure of the transaction.
    |
    */

    'accounts' => [
        'staging' => [
            'sandbox' => true,
            'key' => 'e1U5Z7bzKDOyGAFcNsZcAMZIZaHu94vg',
            'secret' => 'P5w2Ke3v30ixgxu3',
            'initiator' => 'testapi113',
            'id_validation_callback' => 'http://127.0.0.1:8000/mpesa/callback?secret=HPDMlyK/JGjZxiwRiKO8SPfNi5Mi4a/RjSa25r/ELb12JfqYsbBQy6F2MvpF3iFUIHPG+X9ZU0A7U6CtoHu27zzh36HlP6LcISXnAxIloUxR/IRgRQtGvrFNwMkx/ppr03SLhYN3Dw+c6w4ptOoKab3GYXDrSZor2jNoao5mU/ldxr53FDXICkeSm9oMBA69HdPceU3cPoi4ZYngguL9N/Uxy6p135Qg1ip9OBcGFbVnP62FcYmReP9zv/yNQw/8LkbFGHfl7kfUzh2IfekdI23s38vkKL//0bJO73UDaX13siPLSHsKUEoxe2ihkJdwErvz4zoRuFn7jhgXjWuwxA==',
            'lnmo' => [
                'paybill' => 174379,
                'shortcode' => 174379,
                'passkey' => 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919',
                'callback' => 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl/callback?secret=HPDMlyK/JGjZxiwRiKO8SPfNi5Mi4a/RjSa25r/ELb12JfqYsbBQy6F2MvpF3iFUIHPG+X9ZU0A7U6CtoHu27zzh36HlP6LcISXnAxIloUxR/IRgRQtGvrFNwMkx/ppr03SLhYN3Dw+c6w4ptOoKab3GYXDrSZor2jNoao5mU/ldxr53FDXICkeSm9oMBA69HdPceU3cPoi4ZYngguL9N/Uxy6p135Qg1ip9OBcGFbVnP62FcYmReP9zv/yNQw/8LkbFGHfl7kfUzh2IfekdI23s38vkKL//0bJO73UDaX13siPLSHsKUEoxe2ihkJdwErvz4zoRuFn7jhgXjWuwxA==',
            ]
        ],

        'production' => [
            'sandbox' => false,
            'key' => '',
            'secret' => '',
            'initiator' => 'apitest363',
            'id_validation_callback' => 'http://example.com/callback?secret=some_secret_hash_key',
            'lnmo' => [
                'paybill' => 174379,
                'shortcode' => 174379,
                'passkey' => 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919',
                'callback' => 'http://example.com/callback?secret=some_secret_hash_key',
            ]
        ],
    ],
];
