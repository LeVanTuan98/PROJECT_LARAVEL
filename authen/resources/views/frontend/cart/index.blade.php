@extends('frontend.layouts.fashion')
@section('title')
    Giỏ hàng
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
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody><tr class="rem1">
                        <td class="invert">1</td>
                        <td class="invert-image"><a href="single.html"><img src="images/j3.jpg" alt=" " class="img-responsive"></a></td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <div class="entry value-minus">&nbsp;</div>
                                    <div class="entry value"><span>1</span></div>
                                    <div class="entry value-plus active">&nbsp;</div>
                                </div>
                            </div>
                        </td>
                        <td class="invert">Beige solid Chinos</td>
                        <td class="invert">$5.00</td>
                        <td class="invert">$200.00</td>
                        <td class="invert">
                            <div class="rem">
                                <div class="close1">Remove</div>
                            </div>
                            <script>$(document).ready(function(c) {
                                    $('.close1').on('click', function(c){
                                        $('.rem1').fadeOut('slow', function(c){
                                            $('.rem1').remove();
                                        });
                                    });
                                });
                            </script>
                        </td>
                    </tr>
                    <tr class="rem2">
                        <td class="invert">2</td>
                        <td class="invert-image"><a href="single.html"><img src="images/ss5.jpg" alt=" " class="img-responsive"></a></td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <div class="entry value-minus">&nbsp;</div>
                                    <div class="entry value"><span>1</span></div>
                                    <div class="entry value-plus active">&nbsp;</div>
                                </div>
                            </div>
                        </td>
                        <td class="invert">Floral Border Skirt</td>
                        <td class="invert">$5.00</td>
                        <td class="invert">$270.00</td>
                        <td class="invert">
                            <div class="rem">
                                <div class="close2">Remove </div>
                            </div>
                            <script>$(document).ready(function(c) {
                                    $('.close2').on('click', function(c){
                                        $('.rem2').fadeOut('slow', function(c){
                                            $('.rem2').remove();
                                        });
                                    });
                                });
                            </script>
                        </td>
                    </tr>
                    <tr class="rem3">
                        <td class="invert">3</td>
                        <td class="invert-image"><a href="single.html"><img src="images/c7.jpg" alt=" " class="img-responsive"></a></td>
                        <td class="invert">
                            <div class="quantity">
                                <div class="quantity-select">
                                    <div class="entry value-minus">&nbsp;</div>
                                    <div class="entry value"><span>1</span></div>
                                    <div class="entry value-plus active">&nbsp;</div>
                                </div>
                            </div>
                        </td>
                        <td class="invert">Beige Sandals</td>
                        <td class="invert">$5.00</td>
                        <td class="invert">$212.00</td>
                        <td class="invert">
                            <div class="rem">
                                <div class="close3"> Remove</div>
                            </div>
                            <script>$(document).ready(function(c) {
                                    $('.close3').on('click', function(c){
                                        $('.rem3').fadeOut('slow', function(c){
                                            $('.rem3').remove();
                                        });
                                    });
                                });
                            </script>
                        </td>
                    </tr>
                    <!--quantity-->
                    <script>
                        $('.value-plus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                            divUpd.text(newVal);
                        });

                        $('.value-minus').on('click', function(){
                            var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                            if(newVal>=1) divUpd.text(newVal);
                        });
                    </script>
                    <!--quantity-->
                    </tbody></table>
            </div>
            <div class="checkout-left">
                <div class="checkout-left-basket">
                    <h4>Continue to basket</h4>
                    <ul>
                        <li>Product1 <i>-</i> <span>$200.00 </span></li>
                        <li>Product2 <i>-</i> <span>$270.00 </span></li>
                        <li>Product3 <i>-</i> <span>$212.00 </span></li>
                        <li>Total Service Charges <i>-</i> <span>$15.00</span></li>
                        <li>Total <i>-</i> <span>$697.00</span></li>
                    </ul>
                </div>
                <div class="checkout-right-basket">
                    <a href="products.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping</a>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>

</div>
@endsection

