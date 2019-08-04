@extends('frontend.layouts.fashion')
@section('title')
    Thanh toán
@endsection
@section('content')
    <style type="text/css">
        #custom_cart .banner-bottom, .team, .checkout, .additional_info, .team-bottom, .single, .mail, .special-deals, .about, .faq, .typo, .new-products, .banner-bottom1, .top-brands, .dresses, .w3l_related_products {
            padding: 5em 0; }
        #custom_cart .checkout h3 {
            font-size: 1em;
            color: #212121;
            text-transform: uppercase;
            margin: 0 0 3em;
        }
        #custom_cart .checkout h3 span {
            color: #ff9b05;
        }
        #custom_cart table.timetable_sub {
            width: 100%;
            margin: 0 auto;
        }
        #custom_cart .timetable_sub thead {
            background: #F2F2F2;
        }
        #custom_cart .timetable_sub th:nth-child(1) {
            border-left: 1px solid #C5C5C5;
        }
        #custom_cart .timetable_sub th, .timetable_sub td {
            text-align: center;
            padding: 7px;
            font-size: 14px;
            color: #212121;
        }
        #custom_cart .timetable_sub td {
            border: 1px solid #CDCDCD;
        }
        #custom_cart .quantity-select .entry.value-minus, .quantity-select .entry.value-minus1 {
            margin-left: 0;
        }
        #custom_cart .value, .value1 {
            cursor: default;
            width: 40px;
            height: 40px;
            padding: 8px 0px;
            color: #A9A9A9;
            line-height: 24px;
            border: 1px solid #E5E5E5;
            background-color: #E5E5E5;
            text-align: center;
            display: inline-block;
            margin-right: 3px;
        }

        #custom_cart .value-minus, .value-plus, .value-minus1, .value-plus1 {
            height: 40px;
            line-height: 24px;
            width: 40px;
            margin-right: 3px;
            display: inline-block;
            cursor: pointer;
            position: relative;
            font-size: 18px;
            color: #fff;
            text-align: center;
            -webkit-user-select: none;
            -moz-user-select: none;
            border: 1px solid #b2b2b2;
            vertical-align: bottom;
        }
        #custom_cart .rem {
            position: relative;
        }


        #custom_cart .checkout-left {
            margin: 2em 0 0;
        }

        #custom_cart .checkout-left-basket {
            float: left;
            width: 25%;
        }

        #custom_cart .checkout-left-basket h4 {
            padding: 1em;
            background: #ff9b05;
            font-size: 1.1em;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            margin: 0 0 1em;
        }
        #custom_cart ul, label {
            margin: 0;
            padding: 0;
        }
        #custom_cart .checkout-left-basket ul li {
            list-style-type: none;
            margin-bottom: 1em;
            font-size: 14px;
            color: #999;
        }
        #custom_cart .checkout-left-basket ul li span {
            float: right;
        }

        #custom_cart .checkout-right-basket {
            float: right;
            margin: 8em 0 0 0em;
        }
        #custom_cart .checkout-right-basket a {
            padding: 10px 30px;
            color: #fff;
            font-size: 1em;
            background: #212121;
            text-decoration: none;
        }
        #custom_cart .checkout-right-basket a span {
            left: -.5em;
            top: 0.1em;
        }
        #custom_cart .glyphicon {
            position: relative;
            top: 1px;
            display: inline-block;
            font-family: 'Glyphicons Halflings';
            font-style: normal;
            font-weight: normal;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        #custom_cart .checkout-left-basket ul li:nth-child(5) {
            font-size: 1em;
            color: #212121;
            font-weight: 600;
            padding: 1em 0;
            border-top: 1px solid #DDD;
            border-bottom: 1px solid #DDD;
            margin: 2em 0 0;
        }
        #custom_cart .close1, .close2, .close3 {
            /*background: url(frontend_assets/images/remove.png) no-repeat 0px 0px;*/
            cursor: pointer;
            width: 32px;
            height: 32px;
            position: absolute;
            right: 15px;
            top: -13px;
            -webkit-transition: color 0.2s ease-in-out;
            -moz-transition: color 0.2s ease-in-out;
            -o-transition: color 0.2s ease-in-out;
            transition: color 0.2s ease-in-out;
        }
    </style>
    <div id="custom_cart">
        <div class="checkout">
            <div class="container">
                <h3>Your shopping cart contains: <span>3 Products</span></h3>
                <!---728x90--->

                <div class="checkout-right">
                    <table class="timetable_sub">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quality</th>
                            <th>Product Name</th>
                            <th>Service Charges</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody><tr class="rem1">
                            <td class="invert">1</td>
                            <td class="invert-image"><a href="single.html"><img src="images/j3.jpg" alt=" " class="img-responsive"></a></td>
                            <td class="invert">
                                1
                            </td>
                            <td class="invert">Beige solid Chinos</td>
                            <td class="invert">$5.00</td>
                            <td class="invert">$200.00</td>
                        </tr>
                        <tr class="rem2">
                            <td class="invert">2</td>
                            <td class="invert-image"><a href="single.html"><img src="images/ss5.jpg" alt=" " class="img-responsive"></a></td>
                            <td class="invert">
                                2
                            </td>
                            <td class="invert">Floral Border Skirt</td>
                            <td class="invert">$5.00</td>
                            <td class="invert">$270.00</td>
                        </tr>
                        <tr class="rem3">
                            <td class="invert">3</td>
                            <td class="invert-image"><a href="single.html"><img src="images/c7.jpg" alt=" " class="img-responsive"></a></td>
                            <td class="invert">
                                3
                            </td>
                            <td class="invert">Beige Sandals</td>
                            <td class="invert">$5.00</td>
                            <td class="invert">$212.00</td>
                        </tr>
                        </tbody></table>
                </div>

            </div>
        </div>

    </div>
    <style type="text/css">
        #w3Payment {
            margin-top: 20px;
        }
        #w3Payment .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        #w3Payment .col-25 {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
        }

        #w3Payment .col-50 {
            -ms-flex: 50%; /* IE10 */
            flex: 50%;
        }

        #w3Payment .col-75 {
            -ms-flex: 75%; /* IE10 */
            flex: 75%;
        }

        #w3Payment .col-25,
        .col-50,
        .col-75 {
            padding: 0 16px;
        }

        #w3Payment .container {
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        #w3Payment input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #w3Payment label {
            margin-bottom: 10px;
            display: block;
        }

        #w3Payment .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }

        #w3Payment .btn {
            background-color: #00e58b;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        #w3Payment .btn:hover {
            background-color: #00e58b;
            opacity: 0.7;
        }

        #w3Payment span.price {
            float: right;
            color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
            #w3Payment .row {
                flex-direction: column;
            }
            #w3Payment .col-25 {
                margin-bottom: 20px;
                display:none;
            }
        }
    </style>

<div id="w3Payment">
    <div class="row">
        <div class="col-75" style="margin-top: 20px">
            <div class="container">
                <form action="/action_page.php">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="text" id="email" name="email" placeholder="john@example.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="New York">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="NY">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="text" id="zip" name="zip" placeholder="10001">
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                            <label for="ccnum">Credit card number</label>
                            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                            <label for="expmonth">Exp Month</label>
                            <input type="text" id="expmonth" name="expmonth" placeholder="September">

                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                </div>
                            </div>
                        </div>

                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <input type="submit" value="Continue to checkout" class="btn">
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

