
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
            <div id="left-panel" class="pos-content" style="<?php echo $user->getPreference('pos_side_panel') == 'left' ? 'float:right' : null; ?>">
                <div class="contents">
                    <div id="searchbox">
                        <input ng-change="showProductList()" onClick="this.select();" type="text" id="product-name" name="product-name" ng-model="productName" placeholder="<?php echo trans('text_search_product'); ?>"  autofocus>
                        <svg class="svg-icon search-btn"><use href="#icon-pos-search"></svg>
                        <div class="category-search">
                            <select class="form-control select2" name="category-search-select" id="category-search-select">
                                  <option value=""><?php echo sprintf(trans('text_view_all'), 'Products'); ?></option>
                                  <?php foreach (get_category_tree(array('filter_fetch_all' => true)) as $category_id => $category_name) :
                                      if (get_total_valid_category_item($category_id) <= 0) { continue; } ?>
                                      <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?> (<?php echo get_total_valid_category_item($category_id); ?>)</option>
                                  <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div id="item-list">
                        <!-- <div class="pos-product-pagination pagination-top"></div> -->
                        <div ng-show="showLoader" class="ajax-loader">
                            <img src="../assets/itsolution24/img/loading2.gif">
                        </div>
                        <div class="add-new-product-wrapper" data-ng-class="{'show': showAddProductBtn}">
                            <div class="add-new-product">
                                <div class="add-new-product-btn">
                                    <button ng-click="createNewProduct()" class="btn btn-lg btn-danger" style="width:auto;">
                                        <span class="fa fa-fw fa-plus"></span>
                                        <span><?php echo trans('button_add_product'); ?></span>
                                    </button>
                                    <a ng-click="OpenPurchaseProductModal();" class="btn btn-lg btn-danger" style="width:auto;">
                                        <span class="fa fa-fw fa-money"></span>
                                        <span><?php echo trans('button_add_purchase'); ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div ng-repeat="products in productArray" id="{{ $index }}" class="btn btn-flat item">
                            <div ng-click="addItemToInvoice(products.p_id,products)" class="item-inner">
                                <div class="item-img">
                                    <img ng-src="{{ products.p_image }}" alt="{{ products.p_name }}">
                                </div>
                                <span class="item-info" data-id="{{ products.p_id }}" data-name="{{ products.p_name }}">
                                    <span>
                                        {{ products.p_name | cut:true:20:' ...' }}
                                    </span>
                                </span>
                                <span class="item-mask nowrap" title="{{ products.p_name }}">
                                    <svg class="svg-icon"><use href="#icon-add"></svg>
                                    <span><?php echo trans('label_add_to_cart'); ?></span>
                                </span>
                                <span ng-show="products.p_type=='service'"class="ibadge">Service</span>
                            </div>
                        </div>
                        <div class="pos-product-pagination pagination-bottom"></div>
                    </div>
                    <div id="total-amount">
                        <div class="total-amount-inner">
                            <span class="currency-symbol">
                                <?php echo get_currency_symbol(); ?>
                            </span>
                            <span class="main-amount">
                                {{ totalPayable | formatDecimal:2 }}
                            </span>
                        </div>
                        <div id="salesman">
                            <input type="hidden" name="salesman_id" value="<?php echo user_id();?>">
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
                        <a id="invoice-note" ng-click="addInvoiceNote()" data-note="" title="<?php echo trans('text_add_note'); ?>">

                            <span class="fa fa-fw fa-comments-o"></span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- All Product Section End -->

            <!--Invoive Section Start-->
            <div id="right-panel" class="pos-content" style="<?php echo $user->getPreference('pos_side_panel') == 'left' ? 'float:left' : null; ?>">
                <div class="invoice-area">
                    <div class="well well-sm">

                        <!-- Customer Area Start-->
                        <div id="people-area">
                            <input ng-change="showCustomerList()" onClick="this.select();" type="text" id="customer-name" name="customer-name" ng-model="customerName" ng-disabled="isEditMode" autocomplete="off">
                            <input type="hidden" name="customer-id" value="{{ customerId }}">
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
                                        <?php echo trans('label_due'); ?>
                                        <a ng-show="dueAmount" href="customer_profile.php?customer_id={{ customerId }}&type=all_due" target="_blink">
                                            <span id="dueAmount">
                                                {{ dueAmount| formatDecimal:2 }}
                                            </span>
                                        </a>
                                        <div ng-show="!dueAmount">
                                            <span id="dueAmount">
                                                {{ dueAmount| formatDecimal:2 }}
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
                                            <a href="#" ng-click="addCustomer(customers);" onclick="return false;"><span class="fa fa-fw fa-user"></span>{{ customers.customer_name }} ({{ customers.customer_mobile || customers.customer_email }})
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
                                            <?php echo trans('label_quantity'); ?>
                                        </th>
                                        <th>
                                            <?php echo trans('label_product'); ?>
                                        </th>
                                        <th>
                                            <?php echo trans('label_price'); ?>
                                        </th>
                                        <th>
                                            <?php echo trans('label_subtotal'); ?>
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
                                            <td class="product-quantity" id="invoice-item-{{ items.id }}">
                                                <input type="hidden" name="p_type" value="{{ items.pType }}">
                                                <button class="btn btn-xs btn-up" ng-click="addItemToInvoice(items.id)" title="Increase">
                                                    <span class="fa fa-angle-up"></span>
                                                </button>
                                                <input type="text" name="item_price_{{ items.id }}" class="item_quantity text-center" id="item_quantity_{{ items.id }}" value="{{ items.quantity }}" data-itemid="{{ items.id }}" onClick="this.select();" ondrop="return false;" onpaste="return false;" style="width:40px;max-width:40px;border-radius: 50px;border: 1px solid #ddd;padding-top:0;padding-bottom:0;">
                                                <span style="font-size:12px;"><i>{{ items.unitName }}</i></span>
                                                <button class="btn btn-xs btn-down increasebtn{{ items.id }}" ng-click="DecreaseItemFromInvoice(items.id)" title="Decrease">
                                                    <span class="fa fa-angle-down"></span>
                                                </button>
                                            </td>
                                            <td class="product-name">
                                                <span>{{ items.name }}</span>
                                            </td>
                                            <td class="product-price">
                                                <?php if (get_preference('change_item_price_while_billing') == 1) : ?>
                                                    <input type="text" class="text-center item_price" id="item_price_{{ items.id }}" name="item_price_{{ items.id }}" value="{{ items.price | formatDecimal:2 }}" data-itemid="{{ items.id }}" onClick="this.select();" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" style="max-width:80px;padding:5px;border-radius: 20px;border:2px solid #ddd;">
                                                <?php else : ?>
                                                    {{ items.price | formatDecimal:2 }}
                                                <?php endif; ?>
                                            </td>
                                            <td class="product-subtotal">
                                                {{ items.subTotal | formatDecimal:2 }}
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
                                                <?php echo trans('label_total_items'); ?>
                                            </td>
                                            <td class="text-right" width="20%">
                                                {{ totalItem }} ({{ totalQuantity }})
                                            </td>
                                            <td width="30%">
                                                <?php echo trans('label_total'); ?>
                                            </td>
                                            <td class="text-right" width="20%">
                                                {{ totalAmount  | formatDecimal:2 }}
                                            </td>
                                        </tr>
                                        <tr class="pay-top">
                                            <td>
                                                <?php echo trans('label_discount'); ?>
                                            </td>
                                            <td class="text-right">
                                                <input id="discount-input" ng-change="addDiscount()" onClick="this.select();" type="text" name="discount-amount" ng-model="discountInput" ondrop="return false;" onpaste="return false;" autocomplete="off">
                                            </td>
                                            <td>
                                                <?php echo trans('label_tax_amount'); ?> (%)
                                            </td>
                                            <td class="text-right">
                                                <input ng-init="taxInput=<?php echo get_preference('tax'); ?>" ng-change="addTax()" onClick="this.select();" type="text" name="tax-amount" ng-model="taxInput" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" autocomplete="off">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?php echo trans('label_shipping_charge'); ?>
                                            </td>
                                            <td class="text-right">
                                                <input class="text-center shipping" ng-change="addShipping()" onClick="this.select();" type="text" name="shipping-amount" ng-model="shippingInput" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" autocomplete="off">
                                            </td>
                                            <td>
                                                <?php echo trans('label_others_charge'); ?>
                                            </td>
                                            <td class="text-right">
                                                <input class="text-center others-charge" ng-change="addOthersCharge()" onClick="this.select();" type="text" name="others-charge" ng-model="othersChargeInput" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" autocomplete="off">
                                            </td>
                                        </tr>
                                        <tr class="bg-gray">
                                            <td colspan="3">
                                                <?php echo trans('label_total_payable'); ?>
                                            </td>
                                            <td class="text-right">
                                                {{ totalPayable  | formatDecimal:2 }}
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
                                        <?php echo trans('button_pay'); ?>
                                    </button>
                                </div>
                                <div class="btn-group">
                                    <button ng-click="HoldingOrderModal()" on-click="return false;" class="btn btn-danger" data-loading-text="Processing..." title="Order Holdinbg">
                                        <span class="fa fa-fw fa-crosshairs"></span>
                                        <?php echo trans('button_hold'); ?>
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

@stop

@section('js')

@stop
