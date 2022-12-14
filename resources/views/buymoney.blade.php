@extends('template')
@section('content')

<div class="container-fluid mt-3">
    <div class="row">
        <!--左邊切版-->
        <div class="col-lg-2"></div>
        <!--中間切版-->
        <div class="col-lg-8 p-0">
            <div class="container-fluid mt-3 ">
                <div class="row gx-5">
                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/money.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1 mb-0">100&nbsp;</p>
                        </div>
                        <div class="d-flex align-items-center flex-column">
                            <p class="fs-2 ">IN幣</p>
                        </div>
                        <div class="row mb-2">
                            <form class="p-0" action="{{ route('buy.money') }}" method="post">
                                @csrf
                                <input name="pay" value="1" type="hidden">
                                <button type="submit" class="btn btn-success px-4"><img src="/img/gem2.png" style="height: 20px;">1</button>
                            </form>
                        </div>
                    </div>
                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/money.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1 mb-0">1000</p>
                        </div>
                        <div class="d-flex align-items-center flex-column">
                            <p class="fs-2">IN幣</p>
                        </div>
                        <div class="row mb-2">
                            <form class="p-0" action="{{ route('buy.money') }}" method="post">
                                @csrf
                                <input name="pay" value="10" type="hidden">
                                <button type="submit" class="btn btn-success px-4"><img src="/img/gem2.png" style="height: 20px;">10</button>
                            </form>
                        </div>
                    </div>
                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/money.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1 mb-0">2000</p>
                        </div>
                        <div class="d-flex align-items-center flex-column">
                            <p class="fs-2">IN幣</p>
                        </div>
                        <div class="row mb-2">
                            <form class="p-0" action="{{ route('buy.money') }}" method="post">
                                @csrf
                                <input name="pay" value="20" type="hidden">
                                <button type="submit" class="btn btn-success px-4"><img src="/img/gem2.png" style="height: 20px;">20</button>
                            </form>
                        </div>
                    </div>
                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/money.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1 mb-0">3000</p>
                        </div>
                        <div class="d-flex align-items-center flex-column">
                            <p class="fs-2">IN幣</p>
                        </div>
                        <div class="row mb-2">
                            <form class="p-0" action="{{ route('buy.money') }}" method="post">
                                @csrf
                                <input name="pay" value="30" type="hidden">
                                <button type="submit" class="btn btn-success px-4"><img src="/img/gem2.png" style="height: 20px;">30</button>
                            </form>
                        </div>
                    </div>
                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/money.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1 mb-0">4000</p>
                        </div>
                        <div class="d-flex align-items-center flex-column">
                            <p class="fs-2">IN幣</p>
                        </div>
                        <div class="row mb-2">
                            <form class="p-0" action="{{ route('buy.money') }}" method="post">
                                @csrf
                                <input name="pay" value="40" type="hidden">
                                <button type="submit" class="btn btn-success px-4"><img src="/img/gem2.png" style="height: 20px;">40</button>
                            </form>
                        </div>
                    </div>
                    <div class="col mx-1 mb-2 d-flex align-items-center flex-column" style="background-color: white; height: 250px;">
                        <div>
                            <div class="d-flex align-items-center flex-column"><img src="/img/money.png" alt=""></div>
                        </div>
                        <div class="d-flex justify-content-center mt-auto">
                            <p class="fs-1 mb-0">5000</p>
                        </div>
                        <div class="d-flex align-items-center flex-column">
                            <p class="fs-2">IN幣</p>
                        </div>
                        <div class="row mb-2">
                            <form class="p-0" action="{{ route('buy.money') }}" method="post">
                                @csrf
                                <input name="pay" value="50" type="hidden">
                                <button type="submit" class="btn btn-success px-4"><img src="/img/gem2.png" style="height: 20px;">50</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--右邊切版-->
            <div class="col-lg-2"></div>
            <!-- 簽到 -->
            @include('sign_in.first_day')
        </div>
    </div>
    <div id="googlepay" class="col-1"></div>





    <script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>
    <script>
        /* 定義 Google Pay API 版本 */
        const baseRequest = {
            apiVersion: 2,
            apiVersionMinor: 0
        };

        /**
         * Card networks supported by your site and your gateway
         *
         * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
         * @todo confirm card networks supported by your site and gateway
         */
        const allowedCardNetworks = ["AMEX", "DISCOVER", "INTERAC", "JCB", "MASTERCARD", "MIR", "VISA"];

        /**
         * Card authentication methods supported by your site and your gateway
         *
         * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
         * @todo confirm your processor supports Android device tokens for your
         * supported card networks
         */
        const allowedCardAuthMethods = ["PAN_ONLY", "CRYPTOGRAM_3DS"];

        /**
         * Identify your gateway and your site's gateway merchant identifier
         *
         * The Google Pay API response will return an encrypted payment method capable
         * of being charged by a supported gateway after payer authorization
         *
         * @todo check with your gateway on the parameters to pass
         * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#gateway|PaymentMethodTokenizationSpecification}
         */
        const tokenizationSpecification = {
            type: 'PAYMENT_GATEWAY',
            parameters: {
                'gateway': 'example',
                'gatewayMerchantId': 'exampleGatewayMerchantId'
            }
        };

        /**
         * Describe your site's support for the CARD payment method and its required
         * fields
         *
         * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
         */
        const baseCardPaymentMethod = {
            type: 'CARD',
            parameters: {
                allowedAuthMethods: allowedCardAuthMethods,
                allowedCardNetworks: allowedCardNetworks
            }
        };

        /**
         * Describe your site's support for the CARD payment method including optional
         * fields
         *
         * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#CardParameters|CardParameters}
         */
        const cardPaymentMethod = Object.assign({},
            baseCardPaymentMethod, {
                tokenizationSpecification: tokenizationSpecification
            }
        );

        /**
         * An initialized google.payments.api.PaymentsClient object or null if not yet set
         *
         * @see {@link getGooglePaymentsClient}
         */
        let paymentsClient = null;

        /**
         * Configure your site's support for payment methods supported by the Google Pay
         * API.
         *
         * Each member of allowedPaymentMethods should contain only the required fields,
         * allowing reuse of this base request when determining a viewer's ability
         * to pay and later requesting a supported payment method
         *
         * @returns {object} Google Pay API version, payment methods supported by the site
         */
        function getGoogleIsReadyToPayRequest() {
            return Object.assign({},
                baseRequest, {
                    allowedPaymentMethods: [baseCardPaymentMethod]
                }
            );
        }

        /**
         * Configure support for the Google Pay API
         *
         * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#PaymentDataRequest|PaymentDataRequest}
         * @returns {object} PaymentDataRequest fields
         */
        function getGooglePaymentDataRequest() {
            const paymentDataRequest = Object.assign({}, baseRequest);
            paymentDataRequest.allowedPaymentMethods = [cardPaymentMethod];
            paymentDataRequest.transactionInfo = getGoogleTransactionInfo();
            paymentDataRequest.merchantInfo = {
                // @todo a merchant ID is available for a production environment after approval by Google
                // See {@link https://developers.google.com/pay/api/web/guides/test-and-deploy/integration-checklist|Integration checklist}
                // merchantId: '12345678901234567890',
                merchantName: 'Example Merchant'
            };
            return paymentDataRequest;
        }

        /**
         * Return an active PaymentsClient or initialize
         *
         * @see {@link https://developers.google.com/pay/api/web/reference/client#PaymentsClient|PaymentsClient constructor}
         * @returns {google.payments.api.PaymentsClient} Google Pay API client
         */
        function getGooglePaymentsClient() {
            if (paymentsClient === null) {
                paymentsClient = new google.payments.api.PaymentsClient({
                    environment: 'TEST'
                });
            }
            return paymentsClient;
        }

        /**
         * Initialize Google PaymentsClient after Google-hosted JavaScript has loaded
         *
         * Display a Google Pay payment button after confirmation of the viewer's
         * ability to pay.
         */
        function onGooglePayLoaded() {
            const paymentsClient = getGooglePaymentsClient();
            paymentsClient.isReadyToPay(getGoogleIsReadyToPayRequest())
                .then(function(response) {
                    if (response.result) {
                        addGooglePayButton();
                        // @todo prefetch payment data to improve performance after confirming site functionality
                        // prefetchGooglePaymentData();
                    }
                })
                .catch(function(err) {
                    // show error in developer console for debugging
                    console.error(err);
                });
        }

        /**
         * Add a Google Pay purchase button alongside an existing checkout button
         *
         * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#ButtonOptions|Button options}
         * @see {@link https://developers.google.com/pay/api/web/guides/brand-guidelines|Google Pay brand guidelines}
         */
        function addGooglePayButton() {
            const paymentsClient = getGooglePaymentsClient();
            const button =
                paymentsClient.createButton({
                    onClick: onGooglePaymentButtonClicked,
                    allowedPaymentMethods: [baseCardPaymentMethod]
                });
            document.getElementById('googlepay').appendChild(button);
        }

        /**
         * Provide Google Pay API with a payment amount, currency, and amount status
         *
         * @see {@link https://developers.google.com/pay/api/web/reference/request-objects#TransactionInfo|TransactionInfo}
         * @returns {object} transaction info, suitable for use as transactionInfo property of PaymentDataRequest
         */
        function getGoogleTransactionInfo() {
            return {
                countryCode: 'US',
                currencyCode: 'USD',
                totalPriceStatus: 'FINAL',
                // set to cart total
                totalPrice: '1.00'
            };
        }

        /**
         * Prefetch payment data to improve performance
         *
         * @see {@link https://developers.google.com/pay/api/web/reference/client#prefetchPaymentData|prefetchPaymentData()}
         */
        function prefetchGooglePaymentData() {
            const paymentDataRequest = getGooglePaymentDataRequest();
            // transactionInfo must be set but does not affect cache
            paymentDataRequest.transactionInfo = {
                totalPriceStatus: 'NOT_CURRENTLY_KNOWN',
                currencyCode: 'USD'
            };
            const paymentsClient = getGooglePaymentsClient();
            paymentsClient.prefetchPaymentData(paymentDataRequest);
        }

        /**
         * Show Google Pay payment sheet when Google Pay payment button is clicked
         */
        function onGooglePaymentButtonClicked() {
            const paymentDataRequest = getGooglePaymentDataRequest();
            paymentDataRequest.transactionInfo = getGoogleTransactionInfo();

            const paymentsClient = getGooglePaymentsClient();
            paymentsClient.loadPaymentData(paymentDataRequest)
                .then(function(paymentData) {
                    // handle the response
                    processPayment(paymentData);
                })
                .catch(function(err) {
                    // show error in developer console for debugging
                    console.error(err);
                });
        }
        /**
         * Process payment data returned by the Google Pay API
         *
         * @param {object} paymentData response from Google Pay API after user approves payment
         * @see {@link https://developers.google.com/pay/api/web/reference/response-objects#PaymentData|PaymentData object reference}
         */
        function processPayment(paymentData) {
            // show returned data in developer console for debugging
            console.log(paymentData);
            // @todo pass payment token to your gateway to process payment
            paymentToken = paymentData.paymentMethodData.tokenizationData.token;
        }
    </script>
    @stop