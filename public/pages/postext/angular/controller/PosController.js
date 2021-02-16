'use strict';
var angularApp = window.angular.module("angularApp",["ngAnimate","ui.bootstrap","angular-bind-html-compile"]);

angularApp.constant("API_URL", window.baseUrl);
angularApp.constant("window", window);
angularApp.constant("jQuery", window.jQuery);

angularApp.controller("PosController",["$scope","$http","window","$uibModal","CustomerCreateModal","CustomerEditModal","jQuery",function($scope,$http,window,$uibModal,CustomerCreateModal,CustomerEditModal){


    $scope._percentage = function (amount, per)
    {
        if(false === $scope._isNumeric(amount) || false === $scope._isNumeric(per)) {
           /*  if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            } */
            window.toastr.error("The discount amount isn't numeric!", "Warning!");
            return 0;
        }
        return (amount/100)*per;
    };
    $scope._isNumeric = function (val) {
      return !isNaN(parseFloat(val)) && 'undefined' !== typeof val ? parseFloat(val) : false;
    };
    $scope._isInt = function (value) {
        return !isNaN(value) &&
             parseInt(Number(value)) == value &&
             !isNaN(parseInt(value, 10));
    };



    $scope.error = false;
    $scope.isEditMode = false;
    $scope._isInt = function (value) {
        return !isNaN(value) &&
             parseInt(Number(value)) == value &&
             !isNaN(parseInt(value, 10));
    };
    $scope.invoiceId = null;
    $scope.orderData = {};
    $scope.billData = {};
   $scope.orderData.store_name = window.store.name;
    $scope.orderData.header = "\nOrder\n\n";
    $scope.billData.store_name = window.store.name;
    $scope.billData.header = "\nBill\n\n";
    $scope.billData.footer = "\nMerchant Copy\n\n";

    // ===============================================
    // Start Customer dropdown list
    // ===============================================

    $scope.customerName = "";
    $scope.customerMobileNumber = "";
    $scope.dueAmount = 0;
    $scope.hideCustomerDropdown = false;
    $scope.customerArray = [];
    $scope.showCustomerList = function (isClick) {
        if ($scope.isEditMode) { return false; }
        if (isClick) { $scope.customerName = ""; }
        if (window.deviceType == 'computer') {
            $("#customer-name").focus();
        }
        $http({
            url:"/cliente/clientlist",
            method: "GET",
            cache: false,
            processData: false,
            contentType: false,
            dataType: "json"
        }).
        then(function(response) {

            $scope.hideCustomerDropdown = false;
            $scope.customerArray = [];
            window.angular.forEach(response.data, function(customerItem, key) {
                if (customerItem) {

                    $("#customer-dropdown").scrollTop($("#customer-dropdown").offset().top);
                  /*   $("#customer-dropdown").perfectScrollbar("update"); */
                    $scope.customerArray.push(customerItem);
                }
            });

        },function(response) {
           /*  if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            } */
            window.toastr.error(response.data.errorMsg, "Warning!");
        } );
    };
    $("#customer-name").on("click", function() {
        $scope.showCustomerList(true);
    });


    $scope.addCustomer = function (customer) {
        if ($scope._isInt(customer)) {
            $http({
                url:"cliente/datoscliente/"+customer,
                method: "GET",
                cache: false,
                processData: false,
                contentType: false,
                dataType: "json"
            }).
            then(function(response) {
                if (response.data.id) {
                    $scope.addCustomer(response.data);
                }
            }, function(response) {
               /*  if (window.store.sound_effect == 1) {
                    window.storeApp.playSound("error.mp3");
                } */
                window.toastr.error(response.data.errorMsg, "Warning!");
            });
        } else if (customer.id) {
            var contact = customer.nCelular || customer.email;
            $scope.customerName = customer.nombre_razon + " (" + contact + ")";
            $scope.customerMobileNumber = customer.nCelular;
            $scope.customerEmail = customer.email;
            $scope.customerId = customer.id;
         /*    $scope.dueAmount = parseFloat(customer.due); */
            $scope.hideCustomerDropdown = true;
            var pos_customer = "C: " + $scope.customerName + "\n";
            var ob_info = pos_customer+ "\n";
            $scope.orderData.info = ob_info;
            $scope.billData.info = ob_info;
            $scope._calcTotalPayable();
        } else {
         /*    if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            } */
            window.toastr.error("Oops!, Invalid customer", "Warning!");
        }
    };

   if (window.getParameterByName("customer_id")) {
       $scope.addCustomer(window.getParameterByName("customer_id"));
    } else {
        // add walking customer to invoice
        $scope.addCustomer(1);
    }
    // ===============================================
    // End Customer dropdown list
    // ===============================================

    // ===============================================
    // Start Product list
    // ===============================================

    $scope.productName = "";
    $scope.showLoader = !1;

    $scope.showAddProductBtn = !1;
    $scope.totalProduct = 0;
    var page = 1;
    $scope.showProductList = function (page,url) {
        $(".pos-product-pagination").empty();
        page = page ? page : 1;
        $scope.showLoader = 1;

        var productCode = $scope.productName;

        var categoryId = $scope.ProductCategoryID ? $scope.ProductCategoryID : '';
        $http({
            url: url ? url :"/pos/producto",
            method: "POST",
            cache: false,
            data:{
                op:categoryId,
                term:productCode
            },
            processData: false,
            contentType: false,
            dataType: "json"
        }).
        then(function(response) {

         $scope.productArray = [];
            window.angular.forEach(response.data.products, function(productItem, key) {

              if (productItem) {
                var find = window._.find($scope.productArray, function (item) {

                    return item.id === productItem.id;

                });
                if (!find) {
                    $scope.productArray.push(productItem);

                }
              }
            });

           /*  $("#item-list").perfectScrollbar('update'); */
            $scope.totalProduct = parseInt($scope.productArray.length);

            $scope.showLoader = !1;
            if ($scope.totalProduct == 1 && productCode) {
                window.angular.forEach(response.data.products, function(productItem, key) {
                  if (productItem) {
                    $scope.addItemToInvoice(productItem.id);
                    $scope.productName = '';
                  }
                });
            };

            setTimeout(function () {
                $scope.$apply(function(){
                    $scope.showAddProductBtn = !parseInt($scope.totalProduct);
                });
            }, 100);
            $(".pos-product-pagination").html(response.data.pagination);
        }, function(response) {
         /*    if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            } */
             window.toastr.error(response.data.errorMsg, "Warning!");
        });
    };
    $scope.showProductList();

    $(document).delegate(".pos-product-pagination li > a", "click", function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        var $this = $(this);
        var actionURL = $this.attr("href");
        $scope.showProductList(null,actionURL);
    });

    $("#category-search-select").on('select2:selecting', function(e) {
        var categoryID = e.params.args.data.id;
        $scope.ProductCategoryID = categoryID;
        $scope.showProductList();
    });

    $("#salesman_id").on('select2:selecting', function(e) {
        var salesmanId = e.params.args.data.id;
        $scope.salesmanId = salesmanId;
    });

    // ===============================================
    // End Product list
    // ===============================================


    // ===============================================
    // Start Invoice Calculation
    // ===============================================

    $scope.itemArray        = [];
    $scope.totalItem        = 0;
    $scope.totalQuantity    = 0;
    $scope.totalAmount      = 0;
    $scope.discountAmount   = 0;
    $scope.taxAmount        = 0;
    $scope.itemTaxAmount    = 0;
    $scope.shippingAmount   = 0;
    $scope.othersCharge     = 0;
    $scope.payable          = 0;
    $scope.totalPayable     = 0;
    $scope.taxInput         = 0;
    $scope.discountInput    = 0;
    $scope.shippingInput    = 0;
    $scope.othersChargeInput= 0;
    $scope.discountType     = 'plain';
    $scope.shippingType     = 'plain';

    $scope.isInstallment = window.isInstallment;
    $scope.isInstallmentOrder = 0;
    $scope.installmentDuration = 0;
    $scope.installmentIntervalCount = 30;
    $scope.installmentInterestPercentage = 0;
    $scope.installmentInterestAmount = 0;

    //Calcular cantidad de descuento
    $scope._calcDisAmount = function () {
        if (window._.includes($scope.discountInput, '%')) {
            $scope.discountType = 'percentage';
        } else {
            $scope.discountType = 'plain';
        }
        if ($scope.discountInput < 1) {
            $scope.discountAmount = 0;
            $scope.discountInput = 0;
        } else {
            $scope.discountAmount = parseFloat($scope.discountInput);
        }
    };

    //Calcular Cantidad del impuesto
    $scope._calcTaxAmount = function () {
        if ($scope.taxInput < 1 || $scope.taxInput > 100) {
            $scope.taxAmount = 0;
            $scope.taxInput = 0;
        } else {
            $scope.taxAmount = (parseFloat($scope.taxInput) / 100) * parseFloat($scope.totalAmount-$scope.itemTaxAmount);
        }
    };

    //Calcular la cantidad del envío
    $scope._calcShippingAmount = function () {
        if (window._.includes($scope.shippingInput, '%')) {
            $scope.shippingType = 'percentage';
        } else {
            $scope.shippingType = 'plain';
        }
        if ($scope.shippingInput < 1) {
            $scope.shippingAmount = 0;
            $scope.shippingInput = 0;
        } else {
            $scope.shippingAmount = parseFloat($scope.shippingInput);
        }
    };

    //Calcular otros cargos
    $scope._calcOthersCharge = function () {
        if ($scope.othersChargeInput < 1) {
            $scope.othersCharge = 0;
            $scope.othersChargeInput = 0;
        } else {
            $scope.othersCharge = parseFloat($scope.othersChargeInput);
        }
    };

    //Calcular total a pagar
    $scope._calcTotalPayable = function ($childScope) {
        if ($childScope) {
            $scope.installmentInterestAmount = $childScope.installmentInterestAmount;
        } else {
            $scope.installmentInterestAmount = 0;
        }
        var discountPercentage = 0;
        var shippingPercentage = 0;
        $scope._calcDisAmount();
        $scope._calcTaxAmount();
        $scope._calcShippingAmount();
        $scope._calcOthersCharge();
        $scope.payable = ($scope.totalAmount  + $scope.taxAmount);
        if ($scope.payable != 0 && ($scope.discountAmount >= $scope.payable)) {
            $scope.discountAmount = 0;
            $scope.discountInput = 0;
         /*    if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            } */
            window.toastr.error("Discount amount must be less than payable amount", "Warning!");
        }
        if ($scope.payable != 0 && ($scope.shippingAmount >= $scope.payable)) {
            $scope.shippingAmount = 0;
            $scope.shippingInput = 0;
          /*   if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            } */
            window.toastr.error("Shipping amount must be less than payable amount", "Warning!");
        }
        if ($scope.discountType == 'percentage') {
            discountPercentage =  parseFloat($scope._percentage($scope.payable, $scope.discountAmount));
        } else {
            discountPercentage =  parseFloat($scope.discountAmount);
        }

        if ($scope.shippingType == 'percentage') {
            shippingPercentage =  parseFloat($scope._percentage($scope.totalPayable, $scope.shippingAmount));
        } else {
            shippingPercentage =  parseFloat($scope.shippingAmount);
        }

        $scope.payable = ($scope.payable + shippingPercentage + $scope.othersCharge + $scope.dueAmount) - discountPercentage;
        $scope.totalPayable =  $scope.payable + $scope.installmentInterestAmount;
        $scope.billData.totals = "Grand Total   " + $scope.totalPayable;
    };
    $scope.addDiscount = function () {
        $scope._calcTotalPayable();
    };
    $scope.addTax = function () {
        $scope._calcTotalPayable();
    };
    $scope.addShipping = function () {
        $scope._calcTotalPayable();
    };
    $scope.addOthersCharge = function () {
        $scope._calcTotalPayable();
    };
    $scope.itemQuantity = 0;
    $scope.isPrevQuantityCalcculate = false;
    $scope.prevQuantity = 0;
    $scope.itemListHeight = 0;

    // ===============================================
    // End Invoice Calculation
    // ===============================================


    // ===============================================
    // Start Add Product to Invoice
    // ===============================================

    $scope.addItemToInvoice = function (id, qty, index) {
        var proQty;
        var qty = parseFloat(qty);
        if (!qty) {
            qty = 1;
        }
        if (index != null) {
            var selectItem = $("#"+index);
            $("#item-list .item").removeClass("select");
            if (selectItem.length) {
                selectItem.addClass("select");
            }
        }
      /*   var $queryString = "id=" + id + "&action_type=PRODUCTITEM";
        if (window.getParameterByName("invoice_id")) {
            $queryString += "&is_edit_mode=1";
        } */
        $http({
            url:"/productos/select/"+id,
            method: "GET",
            cache: false,
            processData: false,
            contentType: false,
            dataType: "json"
        }).
        then(function(response) {

            if (response.data.id) {

                var find = window._.find($scope.itemArray, function (item) {
                    return item.id == response.data.id;
                });
                proQty = parseFloat(response.data.stock);
                qty = proQty > 0 && proQty < 1 ? proQty : qty;
                if (find) {
                    window._.map($scope.itemArray, function (item) {
                        if (item.id == response.data.id) {
                            if (!$scope.isPrevQuantityCalcculate && window.getParameterByName("customer_id") && window.getParameterByName("invoice_id")) {
                                $scope.isPrevQuantityCalcculate = true;
                                $scope.prevQuantity = item.quantity;
                            }
                            $scope.itemQuantity = item.quantity - $scope.prevQuantity;
                            if ((qty > response.data.stock || $scope.itemQuantity >= response.data.stock) /*&& response.data.p_type != 'service'*/) {
                              /*  if (window.store.sound_effect == 1) {
                                    window.storeApp.playSound("error.mp3");
                                } */
                                window.toastr.error("Este Producto ya no tiene mas Stock!", "Warning!");
                                return false;
                            }
                           /* if (window.store.sound_effect == 1) {
                                window.storeApp.playSound("access.mp3");
                            }*/
                            item.quantity = parseFloat(item.quantity) + qty;
                            $("#item_quantity_"+item.id).val(item.quantity);
                            var taxamount = 0;
                            if (settings.invoice_view == 'indian_gst') {
                                taxamount = 0;
                            } /*else if (response.data.tax_method == 'exclusive') {
                                taxamount = parseFloat(response.data.tax_amount);
                                $scope.itemTaxAmount = taxamount;
                            }*/
                            item.subTotal = (item.subTotal + (parseFloat(response.data.pVenta) * qty)) + taxamount;
                            $scope.totalQuantity = $scope.totalQuantity + qty;
                            $scope.totalAmount = $scope.totalAmount + (parseFloat(response.data.pVenta) * qty) + taxamount;
                        }
                    });
                } else {
                    if ((qty > response.data.stock)/* && response.data.p_type != 'service'*/) {
                     /*   if (window.store.sound_effect == 1) {
                            window.storeApp.playSound("error.mp3");
                        }*/
                        window.toastr.error("Este producto no tiene Stock!", "Warning!");
                        return false;
                    }
                   /* if (window.store.sound_effect == 1) {
                        window.storeApp.playSound("access.mp3");
                    }*/
                    var taxamount = 0;
                   /* if (response.data.tax_method == 'exclusive') {
                        taxamount = parseFloat(response.data.tax_amount);
                        $scope.itemTaxAmount = taxamount;
                    }*/
                    var additonalTaxAmount = taxamount;
                    if (settings.invoice_view == 'indian_gst') {
                        additonalTaxAmount = 0;
                    }
                    var item = [];
                    item.id = response.data.id;
                   // item.pType = response.data.p_type;
                    item.categoryId = response.data.categoria_id;
                    //item.supId = response.data.sup_id;
                    item.name = response.data.nombre;
                   // item.unitName = response.data.unit_name;
                    item.taxamount = taxamount;
                    item.price = parseFloat(response.data.pVenta) + additonalTaxAmount;
                    item.quantity = qty;
                    item.subTotal = (parseFloat(response.data.pVenta) * qty) + additonalTaxAmount;
                    $scope.totalQuantity = $scope.totalQuantity + qty;
                    $scope.totalAmount = $scope.totalAmount + (parseFloat(response.data.pVenta) * qty) + additonalTaxAmount;
                    $scope.itemArray.push(item);
                }
                $scope.totalItem = window._.size($scope.itemArray);
                $scope._calcTotalPayable();
                $scope.productName = '';
                if (window.deviceType == 'computer') {
                    $("#product-name").focus();
                }
                var ele = $("#invoice-item-"+response.data.id).parent();
                if (ele.length) {
                    $scope.itemListHeight = ele.position().top;
                } else {
                    $scope.itemListHeight += 61;
                }
               // $("#invoice-item-list").animate({ scrollTop: $scope.itemListHeight }, 1).perfectScrollbar("update");
                setTimeout(function() {
                    if (!ele.length) {
                        ele = $("#invoice-item-list table tr:last-child");
                    }
                    var flashColor = "#26ff9c";
                    var originalColor = ele.css("backgroundColor");
                    ele.css("backgroundColor", flashColor);
                    setTimeout(function (){
                      ele.css("backgroundColor", originalColor);
                    }, 300);
                }, 100);
                $scope.billData.totals += "\n\nItems: " + $scope.totalItem + " (" + $scope.totalQuantity +")\n";
                //$scope.setBillandOrderItems();
            }
            $scope.showLoader = !1;

            window.onbeforeunload = function() {
              return "Data will be lost if you leave the page, are you sure?";
            };

        }, function(response) {
          /*  if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            }*/
            window.toastr.error(response.data.errorMsg, "Warning!");
            $scope.showLoader = !1;
        });
    };

    // ===============================================
    // End Add Product to Invoice
    // ===============================================


    // ============================================
    // Start Decrease Invoice Item Quantity
    // ============================================

    $scope.DecreaseItemFromInvoice = function (id, qty) {
        var qty = parseFloat(qty);
        if (!qty) {
            qty = 1;
        }
        if (id) {
            var find = window._.find($scope.itemArray, function (item) {
                return item.id == id;
            });
            if (find) {
                window._.map($scope.itemArray, function (item) {
                    if (item.id == id) {
                        if (item.quantity > 1) {
                          /*  if (window.store.sound_effect == 1) {
                                window.storeApp.playSound("modify.mp3");
                            }*/
                            item.quantity = parseFloat(item.quantity) - qty;
                            $("#item_quantity_"+item.id).val(item.quantity);
                            item.subTotal = item.subTotal - (parseFloat(item.price) * qty);
                            $scope.totalQuantity = $scope.totalQuantity - qty;
                            $scope.totalAmount = $scope.totalAmount - parseFloat(item.price);
                        } else {
                           /* if (window.store.sound_effect == 1) {
                                window.storeApp.playSound("error.mp3");
                            }*/
                            window.toastr.error("Quantity can't be less than 1", "Warning!");
                        }
                    }
                });
            }
            $scope.totalItem = window._.size($scope.itemArray);
            $scope._calcTotalPayable();
        }
    };

    // ============================================
    // End Decrease Invoice Item Quantity
    // ============================================


    // ===================================================
    // Start Remove Item from Invoice
    // ===================================================

    $scope.removeItemFromInvoice = function (index, id) {
       /* if (window.store.sound_effect  == 1) {
            window.storeApp.playSound("modify.mp3");
        }*/
        if ($scope.isEditMode) {
            if ($scope.itemArray.length <= 1) {
              /*  if (window.store.sound_effect  == 1) {
                    window.storeApp.playSound("error.mp3");
                }*/
                window.toastr.error("Last item can not be removed!", "Warning!");
                return false;
            }
        }
        window._.map($scope.itemArray, function (item, key) {
            if (item.id == id) {
                $scope.totalQuantity = $scope.totalQuantity - item.quantity;
                $scope.totalAmount = $scope.totalAmount - parseFloat(item.subTotal);
                $scope.totalItem = $scope.totalItem - 1;
            }
        });
        $scope._calcTotalPayable();
        $scope.itemArray.splice(index, 1);
        $scope.totalItem = window._.size($scope.itemArray);
       // $scope.setBillandOrderItems();
    };

    // if invocie edit mode then disable customer dropdown
    if (window.getParameterByName("customer_id") && window.getParameterByName("invoice_id")) {
        $scope.isEditMode = true;
    }

    // ===================================================
    // End Remove Item from Invoice
    // ===================================================

      // ============================================
    // Start Reset POS
    // ============================================

    $scope.resetPos = function (force) {
        localStorage.getItem("swal");
        localStorage.setItem("swal","");
        if (force == 1 && (window.getParameterByName("customer_id") || window.getParameterByName("holding_id") || window.getParameterByName("qref"))) {
            window.location = "pos.php";
        } else {
            $scope.customerArray    = [];
            $scope.itemArray        = [];
            $scope.invoiceId        = "";
            $scope.invoiceNote      = "";
            $scope.hideCustomerDropdown = true;
            $scope.taxInput         = 0;
            $scope.dueAmount        = 0;
            $scope.customerName     = "";
            $scope.customerId       = "";
            $scope.totalItem        = 0;
            $scope.totalQuantity    = 0;
            $scope.totalAmount      = 0;
            $scope.discountAmount   = 0;
            $scope.shippingAmount   = 0;
            $scope.othersCharge     = 0;
            $scope.payable          = 0;
            $scope.totalPayable     = 0;
            $scope.discountInput    = 0;
            $scope.shippingInput    = 0;
            $scope.othersChargeInput= 0;
            $scope.addCustomer(1);
            $("#invoice-note").data("note", "");
            $scope.resetBillandOrderItems();
            $scope.showProductList();
            window.onbeforeunload = null;
        }
    };

    // ============================================
    // End Reset POS
    // ============================================


    // ============================================
    // Start Bill and Order Items
    // ============================================

    $scope.setBillandOrderItems = function() {
        $scope.orderData.items = '';
        $scope.billData.items = '';
        var billaOrderinc = 1;
        var orderItem = '';
        var billItem = '';
        window._.map($scope.itemArray, function (item, key) {
            if (item.id) {
                orderItem += "#";
                orderItem += billaOrderinc;
                orderItem += " - " + item.name;
                orderItem += "\n   ";
                orderItem += '[' + item.quantity + ']';
                orderItem += "\n\n";
                billItem += "#";
                billItem += billaOrderinc;
                billItem += " - " + item.name;
                billItem += "\n   ";
                billItem += item.quantity;
                billItem += " x " + item.price;
                billItem += "   " + item.subTotal;
                billItem += "\n";
            }
            billaOrderinc++;
        });
        $scope.orderData.items = orderItem;
        $scope.billData.items = billItem;
    };
    $scope.resetBillandOrderItems = function() {
        $scope.orderData.header = '';
        $scope.orderData.footer = '';
        $scope.orderData.info = '';
        $scope.orderData.items = {};
        $scope.billData.items = {};
        $scope.orderData.store_name = '';
        $scope.orderData.totals = '';
    };

    // ============================================
    // End Bill and Order Items
    // ============================================



    // =============================================
    // Start Popup Invoice Payment Form
    // =============================================

    $scope.payNow = function() {
        $scope.invoiceNote = $("#invoice-note").data("note");
        if ($scope.itemArray.length <= 0) {
         /*    if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            } */
            window.toastr.error("Please, select at least one product item", "Warning!");
            return false;
        }
        if (!$scope.customerName) {
         /*    if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            } */
            window.toastr.error("Please, select a customer", "Warning!");
            return false;
        }
        $scope.customerId = $(document).find("input[name=\"customer-id\"]").val();
        if ($("#customer-mobile-number").val()) {
            $scope.customerMobileNumber = $("#customer-mobile-number").val();
        }
        setTimeout(function() {
            PaymentFormModal($scope);
        }, 300);
    }

    // =============================================
    // End Popup Invoice Payment Form
    // =============================================


    // =============================================
    // Start Input Item Quantity Manually
    // =============================================

    $scope.triggerKeyup = false;
    $(document).delegate(".item_quantity", "keyup", function(e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        var  itemid = $(this).data("itemid");
        var  itemquantity = $(this).val();
        var totalAmount = 0;
        window._.map($scope.itemArray, function (item) {
            if (item.id == itemid) {
                item.quantity = itemquantity;
                item.subTotal = item.price * itemquantity;
                $scope.$applyAsync(function() {
                    $scope.itemArray = $scope.itemArray;
                });
            }
            totalAmount += item.subTotal;
            $scope.$applyAsync(function() {
                $scope.totalAmount = totalAmount;
                $scope._calcTotalPayable();
            });
        });
        if ($scope.triggerKeyup == false) {
            $scope.error = false;
        } else {
            $scope.triggerKeyup = false;
        }
    });
    $(document).on('click', function(e) {
        if ($scope.error == false) {
            window._.map($scope.itemArray, function (item) {
                var itemquantity = parseFloat($("#item_quantity_"+item.id).val());

                $http({
                    url:"/productos/select/"+item.id,
                    method: "GET",
                    cache: false,
                    processData: false,
                    contentType: false,
                    dataType: "json"
                }).
                then(function(response) {
                    if (response.data.id) {
                        if ((itemquantity > response.data.stock || $scope.itemQuantity >= response.data.stock)) {
                            if ($scope.error == false) {
                                $scope.error = true;
                                $scope.triggerKeyup = true;
                                $("#item_quantity_"+item.id).val(response.data.stock).trigger("keyup");
                                $(document).trigger("click");
                              /*   if (window.store.sound_effect == 1) {
                                    window.storeApp.playSound("error.mp3");
                                } */
                                window.toastr.error("This product is out of stock!", "Warning!");
                            }
                        } else {
                            $scope.error = true;
                            $scope.triggerKeyup = true;
                        }
                    }
                }, function(response) {
                   /*  if (window.store.sound_effect == 1) {
                        window.storeApp.playSound("error.mp3");
                    } */
                    window.toastr.error(response.data.errorMsg, "Warning!");
                });
            });
        }
    });

    // =============================================
    // End Input Item Quantity Manually
    // =============================================


    // =============================================
    // Start Input Item Price Manually
    // =============================================

    if (window.settings.change_item_price_while_billing == 1) {
        $(document).delegate(".item_price", "keyup", function(e) {
            e.preventDefault();
            e.stopPropagation();
            e.stopImmediatePropagation();
            var  itemid = $(this).data("itemid");
            var  itemprice = $(this).val();
            var totalAmount = 0;
            window._.map($scope.itemArray, function (item) {
                if (item.id == itemid) {
                    item.price = itemprice;
                    item.subTotal = item.quantity * itemprice;
                    $scope.$apply(function() {
                        $scope.itemArray = $scope.itemArray;
                    });
                }
                totalAmount += item.subTotal;
                $scope.$apply(function() {
                    $scope.totalAmount = totalAmount;
                    $scope._calcTotalPayable();
                });
            });
        });
    }

    // =============================================
    // End Input Item Price Manually
    // =============================================

    // Create new product
    $scope.createNewCustomer = function () {
        if ($scope.invoiceId) return false;
        $scope.dueAmount = 0;
        $scope.addCustomer(1);
        CustomerCreateModal($scope);
    };

    //Edit Cliente

    $scope.CustomerEditModal = function() {
        $scope.customer_name = $scope.customerName;
        $scope.customer_id = $scope.customerId;
        CustomerEditModal($scope);
    };






    // =============================================
    // Start Custom Command Handler for Context Menu
    // =============================================
    /*

    $.contextMenu.types.label = function(item, opt, root) {
        $("<span>Quantity<div>"
        + "<div class=\"input-group input-group-sm\">"
        + "<input class=\"form-control\" type=\"text\" name=\"add-quantity\" value=\"1\" onClick=\"this.select()\" onKeyUp=\"if(this.value<0 || this.value>100000){this.value=1}\">"
        +   "<span class=\"input-group-btn\">"
        +    "<button class=\"btn btn-default add\" type=\"button\">Add</button>"
        +  "</span>"
        +  "</div>")
        .appendTo(this)
        .on("click", "button", function() {
            var itemQuantity = $(this).parent().parent().find("input[name=\"add-quantity\"]").val();
            if (!itemQuantity || parseFloat(itemQuantity) <= 0) {
                if (window.store.sound_effect == 1) {
                    window.storeApp.playSound("error.mp3");
                }
                window.toastr.error("Quantity must be greater than 0!", "Warning!");
                return false;
            }
            $scope.addItemToInvoice($scope.productItemId, parseFloat(itemQuantity));
            root.$menu.trigger("contextmenu:hide");
        });
    };
    */

    // =============================================
    // End Custom Command Handler for Context Menu
    // =============================================


    // =============================================
    // Start Product Item Context Menu
    // =============================================
    /*

    $("#item-list").contextMenu({
        selector: "div.item",
        callback: function(key, options) {
            var p_id = $(this).find(".item-info").data("id");
            var p_name = $(this).find(".item-info").data("name");
            switch(key) {
                case "view":
                    ProductViewModal({p_id:p_id,p_name:p_name});
                break;
                case "edit":
                    ProductEditModal({p_id:p_id,p_name:p_name});
                break;
                case "add":
                    $scope.addItemToInvoice(p_id, 1);
                break;
            }
        },
        items: {
            "add": {name: "Add 1 (one) Item", icon: "fa-plus"},
            "sep1": "---------",
            "add_specific_amount": {name: "Add Specific Quantity", icon: "fa-th", disabled: true},
            "quantity": {
                type: "label",
                customName: "Quantity", callback: function() {
                    $scope.productItemId = $(this).find(".item-info").data("id");
                    return false;
                },
            },
            "view": {name: "View", icon: "fa-eye"},
            "sep2": "---------",
            "edit": {name: "Edit", icon: "fa-pencil"}
        }
    });

    // =============================================
    // End Product Item Context Menu
    // =============================================

*/





}]);
