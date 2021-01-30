
@extends('adminlte::page')

@section('title', 'Home')
@section('sidebar_collapse', true)

@section('content_header')

@stop

@section('content')


<!-- Content Wrapper Start -->
<div class="content-area">
    <div class="row-group">
        <div class="content-row">

            <!-- All Product List Section Start-->
            <div id="left-panel" class="pos-content" >
                <div class="contents">
                    <div id="searchbox">
                        <input ng-change="showProductList()" onClick="this.select();" type="text" id="product-name" name="product-name" ng-model="productName" placeholder="BUSCAR PRODUCTO"  autofocus>
                        <svg class="svg-icon search-btn"><use href="#icon-pos-search"></svg>
                        <div class="category-search">
                            <select class="form-control select2" name="category-search-select" id="category-search-select">
                                  <option value="">VER TODOS</option>
                                  <option value="1">CARNES (2)</option>
                            </select>
                        </div>
                    </div>
                    <div id="item-list">
                        <!-- <div class="pos-product-pagination pagination-top"></div>
                        <div ng-show="showLoader" class="ajax-loader">
                            <img src="../assets/itsolution24/img/loading2.gif">
                        </div>  -->
                        <div class="add-new-product-wrapper" data-ng-class="{'show': showAddProductBtn}">
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
                        </div>
                        <div ng-repeat="products in productArray"  id="0" class="btn btn-flat item">
                            <div ng-click="addItemToInvoice(products.p_id,products)" class="item-inner">
                                <div class="item-img">
                                    <img ng-src="...." alt=".....">
                                </div>
                                <span class="item-info" data-id="...." data-name="...">
                                    <span>
                                        hp core i5
                                    </span>
                                </span>
                                <span class="item-mask nowrap" title="....">
                                    <svg class="svg-icon"><use href="#icon-add"></svg>
                                    <span>AGREGAR A CARRITO</span>
                                </span>
                                <span ng-show="products.p_type=='service'"class="ibadge">Service</span>
                            </div>
                        </div>
                        <div class="pos-product-pagination pagination-bottom"></div>
                    </div>
                    <div id="total-amount">
                        <div class="total-amount-inner">
                            <span class="currency-symbol">
                                S/
                            </span>
                            <span class="main-amount">
                               18000.00
                            </span>
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
                            <input ng-change="showCustomerList()" onClick="this.select();" type="text" id="customer-name" name="customer-name" ng-model="customerName" ng-disabled="isEditMode" autocomplete="off">
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
                                            <a href="#" ng-click="addCustomer(customers);" onclick="return false;"><span class="fa fa-fw fa-user"></span>Customer
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
                                        <th>
                                            CANTIDAD
                                        </th>
                                        <th>
                                            PRODUCTO
                                        </th>
                                        <th>
                                           PRECIO
                                        </th>
                                        <th>
                                            SUB TOTAL
                                        </th>
                                        <th>&nbsp; </th>
                                    </tr>
                                </thead>
                            </table>
                            <!-- Selected Product List Title Start -->

                            <!-- Selected Product List Section Start-->
                            <div id="invoice-item-list">
                                <table class="table table-hovered">
                                    <tbody>
                                        <tr ng-repeat="items in itemArray" class="invoice-item">
                                            <td class="product-quantity" id="invoice-item-1">
                                                <input type="hidden" name="p_type" value="product">
                                                <button class="btn btn-xs btn-up" ng-click="addItemToInvoice(items.id)" title="Increase">
                                                    <span class="fa fa-angle-up"></span>
                                                </button>
                                                <input type="text" name="item_price_1" class="item_quantity text-center" id="item_quantity_1" value="2" data-itemid="1" onClick="this.select();" ondrop="return false;" onpaste="return false;" style="width:40px;max-width:40px;border-radius: 50px;border: 1px solid #ddd;padding-top:0;padding-bottom:0;">
                                                <span style="font-size:12px;"><i>hp store</i></span>
                                                <button class="btn btn-xs btn-down increasebtn1" ng-click="DecreaseItemFromInvoice(items.id)" title="Decrease">
                                                    <span class="fa fa-angle-down"></span>
                                                </button>
                                            </td>
                                            <td class="product-name">
                                                <span>hp store</span>
                                            </td>
                                            <td class="product-price">
                                                <?php if (1 == 1) : ?>
                                                    <input type="text" class="text-center item_price" id="item_price_1" name="item_price_1" value="50.00" data-itemid="1" onClick="this.select();" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="max-width:80px;padding:5px;border-radius: 20px;border:2px solid #ddd;">
                                                <?php else : ?>
                                                666.00
                                                <?php endif; ?>
                                            </td>
                                            <td class="product-subtotal">
                                                333.00
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
                                               3
                                            </td>
                                            <td width="30%">
                                              TOTAL
                                            </td>
                                            <td class="text-right" width="20%">
                                               666333.00
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
                                                <input ng-init="taxInput=0" ng-change="addTax()" onClick="this.select();" type="text" name="tax-amount" ng-model="taxInput" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" autocomplete="off">
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
                                               1111.00
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
                                    <button ng-click="payNow()" onClick="return false;" class="btn btn-success" data-loading-text="Processing..." title="Payment">
                                        <span class="fa fa-fw fa-money"></span>
                                        PAGA
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button ng-click="HoldingOrderModal()" on-click="return false;" class="btn btn-danger" data-loading-text="Processing..." title="Order Holdinbg">
                                        <span class="fa fa-fw fa-crosshairs"></span>
                                        PEDIDOS
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Action Button Section End-->

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- Invoice Section End -->

        </div>
    </div>
</div>
<!-- Content Wrapper End -->

@stop

@section('css')

<link rel="stylesheet" href="{{asset('pages/css/main.css')}}">
<link rel="stylesheet" href="{{asset('pages/css/skeleton.css')}}">
<link rel="stylesheet" href="{{asset('pages/css/pos.css')}}">



@stop

@section('js')

@stop
