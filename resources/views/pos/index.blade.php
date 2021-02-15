<!DOCTYPE html>
<html lang="es" ng-app="angularApp">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panadería Leos | Pos </title>
    <link rel="stylesheet" href="{{asset('pages/postext/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/font-awesome-4.7.0/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('pages/postext/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('pages/postext/css/skins/skin-green.css')}}">
    <link rel="stylesheet" href="{{asset('pages/css/pos/main.css')}}">
    <link rel="stylesheet" href="{{asset('pages/css/pos/skeleton.css')}}">
    <link rel="stylesheet" href="{{asset('pages/postext/css/pos.css')}}">
    <link rel="stylesheet" href="{{asset('pages/css/pos/responsive.css')}}">
    <script type="text/javascript">
		var baseUrl = "http://localhost:81/pos_moderno";
		var lang = "es";
		var adminDir = "admin";
		var user = {"id":1,"group_id":1,"username":"Rony Aguilera","email":"rony_aguilera@hotmail.com","mobile":"231321","dob":"1990-01-01","sex":"M","login_try":0,"last_login":"2021-02-08 18:16:07","ip":"::1","address":null,"preference":"a:4:{s:8:\"language\";s:2:\"es\";s:10:\"base_color\";s:6:\"yellow\";s:14:\"pos_side_panel\";s:5:\"right\";s:11:\"pos_pattern\";s:13:\"brickwall.jpg\";}","user_image":"\/erfil.jpg","created_at":"2019-12-14 22:27:47","updated_at":"2019-07-03 17:29:20","group_name":"admin","sort_order":1,"stores":[1]};
	    var settings = {"gst_reg_no":"","timezone":"America\/Lima","invoice_edit_lifespan":"1440","invoice_edit_lifespan_unit":"minute","invoice_delete_lifespan":"1440","invoice_delete_lifespan_unit":"minute","tax":"0","sms_gateway":"Clickatell","sms_alert":"0","expiring_soon_alert_days":"","datatable_item_limit":"25","reference_format":"year_sequence","sales_reference_prefix":"","receipt_template":"1","invoice_view":"standard","business_state":"AN","change_item_price_while_billing":"0","pos_product_display_limit":"","after_sell_page":"pos","invoice_footer_text":"Thank you for choosing us!","email_from":"tusolutionweb","email_address":"US","email_driver":"smtp_server","send_mail_path":"\/usr\/sbin\/sendmail","smtp_host":"smtp.google.com","smtp_username":"","smtp_port":"465","ssl_tls":"ssl","ftp_hostname":"","ftp_username":""};
        var store = {"store_id":1,"name":"Panaderia Leo's","code_name":"Leo's ","mobile":"231321","email":"info@panaderialeos.com","country":"PE","zip_code":"1200","currency":"USD","vat_reg_no":"","cashier_id":2,"address":"Piura - Piura ","receipt_printer":"1","cash_drawer_codes":null,"char_per_line":42,"remote_printing":0,"printer":1,"order_printers":"[\"1\"]","auto_print":0,"local_printers":1,"logo":"1_logo.jpg","favicon":"1_favicon.png","sound_effect":1,"sort_order":0,"feedback_status":"ready","feedback_at":"2019-03-01 14:29:18","deposit_account_id":1,"thumbnail":null,"status":1,"created_at":"2018-09-24 18:00:00"};
	    var isInstallment = 1;
	    var deviceType = 'computer';
	    var filemanager = 'local';
	    var orderPrinters = [{"printer_id":1,"title":"Common Printer","type":"network","profile":"","char_per_line":200,"created_at":"2018-09-27 13:52:04"}];
	    var printer = {"printer_id":1,"title":"Common Printer","type":"network","profile":"","char_per_line":200,"created_at":"2018-09-27 13:52:04","p2s_id":1,"pprinter_id":1,"store_id":1,"path":"","ip_address":null,"port":"9100","status":1,"sort_order":0};
	    var slideDirection = 'left';
	    var sendReportEmail = '1';

	</script>

</head>
<body class="pos sidebar-mini skin-green right-panel ng-scope"    id="pos-page" ng-controller="PosController">

    <div class="hidden"><?php include('../public/pages/postext/img/iconmin/icon.svg');?></div>

    <div class="pos-content-wrapper">
        @include('Pos.header')

        <!-- Content Wrapper Start -->
        <div class="content-area pos">
            <div class="row-group">
                <div class="content-row">
                            <!-- All Product List Section Start-->
                    <div id="left-panel" class="pos-content" >
                        <div class="contents">
                            <div id="searchbox">
                                <input ng-change="showProductList()" onClick="this.select();" type="text"  class="autocomplete-product" id="product-name" name="product-name" ng-model="productName" placeholder="BUSCAR PRODUCTO"  autofocus>
                                <svg class="svg-icon search-btn"><use href="#icon-pos-search"></svg>
                                <div class="category-search">
                                    <select class="form-control select2" name="category-search-select" id="category-search-select">
                                        <option value="0">VER TODOS</option>
                                        @foreach ($categorias as $categoria)
                                        <option value="{{$categoria['id']}}">{{$categoria['categoria']}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div id="item-list"  style="height:100%;">
                             {{--   <div class="pos-product-pagination pagination-top"></div> --}}
                                <div ng-show="showLoader" class="ajax-loader">
                                    <img src="{{ asset('pages/postext/img/loading2.gif') }}">
                                </div>
                              {{--   <div class="add-new-product-wrapper" data-ng-class="{'show': showAddProductBtn}">
                                    <div class="add-new-product">
                                        <div class="add-new-product-btn">
                                            <button ng-click="createNewProduct()" class="btn btn-lg btn-danger" style="width:auto;">
                                                <span class="fa fa-fw fa-plus"></span>
                                                <span>AGREGAR PRODUCTO</span>
                                            </button>
                                            <a ng-click="OpenPurchaseProductModal();" class="btn btn-lg btn-danger" style="width:auto;">
                                                <span class="fa fa-fw fa-money"></span>
                                                <span>AGREGAR COMPRA</span>
                                            </a>
                                        </div>
                                    </div>
                                </div> --}}

                             {{--    @foreach ($productos as $Producto)
                                <div ng-repeat="products in productArray"  id="0" class="btn btn-flat item">
                                    <div ng-click="addItemToInvoice(products.p_id,products)" class="item-inner">
                                        <div class="item-img">
                                            <img src="/storage/img/Productos/1.jpg" alt="Pan Frances.">
                                        </div>
                                        <span class="item-info" data-id="...." data-name="...">
                                            <span>{{$Producto['nombre']}}</span>
                                        </span>
                                        <span class="item-mask text-nowrap " title="Agregar Producto">
                                            <svg class="svg-icon"><use href="#icon-add"></svg>
                                            <span >AGREGAR A CARRITO</span>
                                        </span>

                                    </div>
                                </div>
                                @endforeach --}}

                                <div ng-repeat="products in productArray" id="@{{ $index }}" class="btn btn-flat item">
									<div ng-click="addItemToInvoice(products.id,products)" class="item-inner">
										<div class="item-img">
											<img ng-src="/storage/img/Productos/1.jpg" alt="@{{ products.nombre }}">
										</div>
										<span class="item-info" data-id="@{{ products.id }}" data-name="@{{ products.nombre }}">
											<span>
												@{{ products.nombre  }}
											</span>
										</span>
										<span class="item-mask nowrap" title="@{{ products.nombre }}">
											<svg class="svg-icon"><use href="#icon-add"></svg>
											<span>AGREGAR A CARRITO</span>
										</span>
										{{-- <span ng-show="products.p_type=='service'"class="ibadge">Service</span> --}}
									</div>
								</div>



                                <div class="pos-product-pagination pagination-bottom">


                                </div>
                            </div>
                            <div id="total-amount">
                                <div class="total-amount-inner">
                                    <span class="currency-symbol">S/</span>
                                    <span class="main-amount"> @{{totalAmount.toFixed(2)}}</span>
                                </div>
                                <div id="salesman">
                                    <input type="hidden" name="salesman_id" value=""> <!--EL ID DEL USER QUE REGISTRA -->
                                    <!--
                                    <select id="salesman_id" name="salesman_id">
                                        <option value=""><?php //echo trans('text_select_salesman');?></option>
                                        <?php //foreach (get_salesmans() as $salesman) : ?>
                                            <option value="<?php //echo $salesman['id']; ?>" <?php //echo store('salesman_id') == $salesman['id'] ? 'selected' : null; ?>>
                                                <?php //echo $salesman['username']; ?>
                                            </option>
                                        <?php //endforeach; ?>
                                    </select>
                                    -->
                                </div>
                                <a id="invoice-note" ng-click="addInvoiceNote()" data-note="" title="AGREGAR NOTA">
                                    <span class="fa fa-fw fa-comments-o"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- All Product Section End -->
                    <!--Invoive Section Start-->
                    <div id="right-panel" class="pos-content">
                        <div class="invoice-area">
                            <div class="well well-sm">

                                <!-- Customer Area Start-->
                                <div id="people-area">
                                    <input ng-change="showCustomerList()" onClick="this.select();" type="text" id="customer-name" name="customer-name" ng-model="customerName" ng-disabled="isEditMode" autocomplete="off"  >
                                    <input type="hidden" name="customer-id" value="111">
                                    <div class="customer-icon">
                                        <a ng-click="showCustomerList(true)" onClick="return false;" href="#">
                                            <svg class="svg-icon"><use href="#icon-pos-customer"></svg>
                                        </a>
                                    </div>
                                    <div class="edit-icon pointer">
                                        <span ng-click="CustomerEditModal();" class="fa fa-edit"></span>
                                        <span id="add-customer-mobile-number-handler" class="fa fa-mobile" style="font-size:18px;margin-left:5px;"></span>
                                        <input id="customer-mobile-number" type="hidden" name="customer-mobile-number">
                                    </div>
                                    <div ng-click="createNewCustomer();" class="add-icon">
                                        <svg class="svg-icon"><use href="#icon-pos-plus"></svg>
                                    </div>
                                    <div class="previous-due">
                                        <div class="previous-due-inner">
                                            <h4>
                                                DEBIDO
                                                <a ng-show="dueAmount" href="customer_profile.php?customer_id=11122&type=all_due" target="_blink">
                                                    <span id="dueAmount">
                                                    0.00
                                                    </span>
                                                </a>
                                                <div ng-show="!dueAmount">
                                                    <span id="dueAmount">
                                                        0.00
                                                    </span>
                                                </div>
                                            </h4>
                                        </div>
                                    </div>
                                    <div ng-hide="hideCustomerDropdown" id="customer-dropdown" class="slidedown-menu">
                                        <div class="slidedown-header">
                                        </div>
                                        <div class="slidedown-body">
                                            <ul class="customer-list list-unstyled">
                                                <li ng-repeat="customers in customerArray">
                                                    <a href="#" ng-click="addCustomer(customers);" onclick="return false;"><span class="fa fa-fw fa-user"></span>@{{ customers.nombre_razon }}(@{{ customers.nCelular || customers.email }})
													</a>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Customer Area Start-->

                                <!-- Invoice Item Start-->
                                <div id="invoice-item">
                                    <!-- Selected Product List Title Start -->
                                    <table id="invoice-item-head" class="table table-striped">
                                        <thead>
                                            <tr class="bg-gray">
                                                <th>CANTIDAD</th>
                                                <th>PRODUCTO</th>
                                                <th>PRECIO</th>
                                                <th>SUB TOTAL</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <!-- Selected Product List Title Start -->

                                    <!-- Selected Product List Section Start-->
                                    <div id="invoice-item-list">
                                        <table class="table table-hovered">
                                            <tbody>
                                                <tr ng-repeat="items in itemArray" class="invoice-item">
                                                    <td class="product-quantity" id="invoice-item-@{{ items.id }}">
                                                        <input type="hidden" name="p_type" value="product">
                                                        <button class="btn btn-xs btn-up" ng-click="addItemToInvoice(items.id)" title="Increase">
                                                            <span class="fa fa-angle-up"></span>
                                                        </button>
                                                        <input type="text" name="item_price_@{{ items.id }}" class="item_quantity text-center" id="item_quantity_@{{ items.id }}" value="@{{ items.quantity }}" data-itemid="@{{ items.id }}" onClick="this.select();" ondrop="return false;" onpaste="return false;" style="width:40px;max-width:40px;border-radius: 50px;border: 1px solid #ddd;padding-top:0;padding-bottom:0;">
                                                        <span style="font-size:12px;"><i>@{{ items.unitName }}</i></span>
                                                        <button class="btn btn-xs btn-down increasebtn@{{ items.id }}" ng-click="DecreaseItemFromInvoice(items.id)" title="Decrease">
                                                            <span class="fa fa-angle-down"></span>
                                                        </button>
                                                    </td>
                                                    <td class="product-name">
                                                        <span>@{{ items.name }}</span>
                                                    </td>
                                                    <td class="product-price">
                                                        <?php if (1 == 1) : ?>
                                                            <input type="text" class="text-center item_price" id="item_price_@{{ items.id }}" name="item_price_@{{ items.id }}" value="@{{ items.price}}" data-itemid="@{{ items.id }}" onClick="this.select();" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="max-width:80px;padding:5px;border-radius: 20px;border:2px solid #ddd;">
                                                        <?php else : ?>
                                                        @{{ items.price  }}
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="product-subtotal">
                                                       @{{ items.subTotal.toFixed(2) }}
                                                    </td>
                                                    <td class="product-delete text-red pointer" ng-click="removeItemFromInvoice($index, items.id)">
                                                        <span class="fa fa-close"></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Selected Product List Section End-->

                                    <!-- Selected Product Calculation Section Start-->
                                    <div id="invoice-calculation" class="clearfix">
                                        <table class="table">
                                            <tbody>
                                                <tr class="bg-gray">
                                                    <td width="30%">
                                                        TOTAL ARTICULOS
                                                    </td>
                                                    <td class="text-right" width="20%">
                                                        @{{ totalItem }} (@{{ totalQuantity }})
                                                    </td>
                                                    <td width="30%">
                                                        TOTAL
                                                    </td>
                                                    <td class="text-right" width="20%">
                                                        @{{totalAmount.toFixed(2)}}
                                                    </td>
                                                </tr>
                                                <tr class="pay-top">
                                                    <td>
                                                        DESCUENTO
                                                    </td>
                                                    <td class="text-right">
                                                        <input id="discount-input" ng-change="addDiscount()" onClick="this.select();" type="text" name="discount-amount" ng-model="discountInput" ondrop="return false;" onpaste="return false;" autocomplete="off">
                                                    </td>
                                                    <td>
                                                        MONTO IMPUESTO (%)
                                                    </td>
                                                    <td class="text-right">
                                                        <input ng-init="taxInput=18" ng-change="addTax()" onClick="this.select();" type="text" name="tax-amount" ng-model="taxInput" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" autocomplete="off">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        COSTO DE ENVÍO
                                                    </td>
                                                    <td class="text-right">
                                                        <input class="text-center shipping" ng-change="addShipping()" onClick="this.select();" type="text" name="shipping-amount" ng-model="shippingInput" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" autocomplete="off">
                                                    </td>
                                                    <td>
                                                        OTROS COBROS
                                                    </td>
                                                    <td class="text-right">
                                                        <input class="text-center others-charge" ng-change="addOthersCharge()" onClick="this.select();" type="text" name="others-charge" ng-model="othersChargeInput" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" autocomplete="off">
                                                    </td>
                                                </tr>
                                                <tr class="bg-gray">
                                                    <td colspan="3">
                                                        TOTAL PAGO
                                                    </td>
                                                    <td class="text-right">
                                                        @{{ totalPayable.toFixed(2) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Selected Product Calculation Section End-->
                                </div>
                                <!-- Invoice Item End-->

                                <!-- Action Button Section Start-->
                                <div id="pay-button" class="text-center">
                                    <div class="btn-group btn-group-justified">
                                        <div class="btn-group">
                                            <button ng-click="payNow()"  onClick="return false;" class="btn btn-success btn-block" data-loading-text="Processing..." title="Payment">
                                                <span class="fa fa-fw fa-money"></span>
                                                PAGA
                                            </button>
                                        </div>
                                        <div class="btn-group">
                                            <button ng-click="HoldingOrderModal()" on-click="return false;" class="btn btn-danger btn-block" data-loading-text="Processing..." title="Order Holdinbg">
                                                <span class="fa fa-fw fa-crosshairs"></span>
                                                PEDIDOS
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Action Button Section End-->

                            </div>
                        </div>
                    </div>
                    <!-- Invoice Section End -->
                </div>
            </div>
        </div>
        <!-- Content Wrapper End -->
    </div>

    <script src="{{ asset('pages/postext/angular/lib/angular.min.js')}}"></script>
    <script src="{{ asset('pages/postext/angular/lib/angular-animate.min.js')}}"></script>
    <script src="{{ asset('pages/postext/angular/lib/ui-bootstrap-tpls-2.5.0.min.js')}}"></script>
    <script src="{{ asset('pages/postext/angular/lib/angular-bind-html-compile.min.js')}}"></script>
    <script src="{{ asset('pages/postext/angular/controller/PosController.js')}}"></script>
    <script src="{{ asset('pages/postext/angular/lib/CustomerModal.js')}}"></script>
    <script src="{{ asset('pages/postext/js/common.js')}}"></script>
    <script src="{{ asset('vendor/underscore/underscore.min.js')}}"></script>
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }} "></script>
    <script src="{{ asset('vendor/toastr/toastr.min.js') }} "></script>


    <script type="text/javascript">
    var areaProductos = '';
    window.CSRF_TOKEN = '{{ csrf_token() }}';
     $('#category-search-select').select2();
        $(document).ready(function() {
            /*

            $("#product-name").autocomplete({

                source:function(request,response) {
                    var op = $('#category-search-select').val();
                    areaProductos = '';
                    $.ajax({
                        url: "{{route('pos.producto')}}",
                        data: {
                            op:op,
                            term:request.term
                        },
                        dataType: "json",
                        success: function (data) {
                            data.forEach(element => {
                            areaProductos+=`
                            <div ng-repeat="products in productArray"  id="0" class="btn btn-flat item">
                                    <div ng-click="addItemToInvoice(products.p_id,products)" class="item-inner">
                                        <div class="item-img">
                                            <img src="/storage/img/Productos/1.jpg" alt="Pan Frances.">
                                        </div>
                                        <span class="item-info" data-id="...." data-name="...">
                                            <span>${element['nombre']}</span>
                                        </span>
                                        <span class="item-mask text-nowrap " title="Agregar Producto">
                                            <svg class="svg-icon"><use href="#icon-add"></svg>
                                            <span >AGREGAR A CARRITO</span>
                                        </span>

                                    </div>
                                </div>
                             `;
                        });
                        $('#item-list').html(areaProductos);

                        }
                    });

                },
              focusOpen: true,
                autoFocus: true,
                minLength: 0,
              /*   select:function(event,ui) {
                    var data = {
                        itemId: ui.item.id,
                        itemNombre: ui.item.value,
                        itemCantidad: 1,
                        itemPrecioU: ui.item.precio
                        };
                    addProduct(data);
                }, */
                /*
                open: function () {

                    if ($(".ui-autocomplete .ui-menu-item").length == 1) {
                        $(".ui-autocomplete .ui-menu-item:first-child").trigger("click");
                        $("#product-name").val("");
                        $("#product-name").focus();
                    }
                },
                close: function () {
                    $(document).find(".autocomplete-product").blur();
                    $(document).find(".autocomplete-product").val("");
                    $("#product-name").focus();
                },
                });



            $('#category-search-select').change(function (e) {
                e.preventDefault();
                let op = $('#category-search-select').val();

                $.ajax({
                    headers: {'X-CSRF-TOKEN': window.CSRF_TOKEN},
                    type: "POST",
                    url: "{{route('pos.productos')}}",
                    data: {'op':op},
                    dataType: "JSON",
                    success: function (response) {
                        areaProductos = '';
                        response.forEach(element => {
                            areaProductos+=`
                            <div ng-repeat="products in productArray"  id="0" class="btn btn-flat item">
                                    <div ng-click="addItemToInvoice(products.p_id,products)" class="item-inner">
                                        <div class="item-img">
                                            <img src="/storage/img/Productos/1.jpg" alt="Pan Frances.">
                                        </div>
                                        <span class="item-info" data-id="...." data-name="...">
                                            <span>${element['nombre']}</span>
                                        </span>
                                        <span class="item-mask text-nowrap " title="Agregar Producto">
                                            <svg class="svg-icon"><use href="#icon-add"></svg>
                                            <span >AGREGAR A CARRITO</span>
                                        </span>

                                    </div>
                                </div>
                             `;
                        });
                        $('#item-list').html(areaProductos);


                    }
                });

            });

            */



            var $pos = $(".pos-content-wrapper");
            $pos.fadeOut(100).fadeIn(500);

            var topBar = $(".main-header").outerHeight();

            var adjustLayout = function () {

                var windowHeight 	=  $(window).outerHeight();

                var searchbox 		= $("#searchbox").outerHeight();
                var totalAmountArea = $("#total-amount").outerHeight();

                var peopleArea 	= $("#people-area").outerHeight();
                var itemHead 	 	= $("#invoice-item-head").outerHeight();
                var totalCalc 		= $("#invoice-calculation").outerHeight();
                var payButton 		= $("#pay-button").outerHeight();

                $("#item-list").css({height:windowHeight-(searchbox+totalAmountArea+topBar)});
                $("#invoice-item-list").css({height: windowHeight-(peopleArea+itemHead +totalCalc+payButton+topBar)+4});
            };

            $(window).resize(function () {
                adjustLayout();
            });

            //$("#item-list, #invoice-item-list, #customer-dropdown").perfectScrollbar();

            // Adjust POS Layout
            adjustLayout();

            // Show live clock at topbar
            //window.liveDateTime('live_datetime');

            $("#minicart").on("click", function() {
                var rightPanel = $("#right-panel");

                if (rightPanel.hasClass("visible")) {
                    rightPanel.removeClass("visible");
                } else {
                    rightPanel.addClass("visible");
                }
            });
        });
        </script>



</body>
</html>
