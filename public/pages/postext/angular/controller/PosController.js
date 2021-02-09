var angularApp = window.angular.module("angularApp",[]);
angularApp.constant("API_URL", window.baseUrl);
angularApp.constant("window", window);
angularApp.constant("jQuery", window.jQuery);
angularApp.controller("PosController", function($scope,$http,window){



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

        },/*  function(response) {
            if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            }
            window.toastr.error(response.data.errorMsg, "Warning!");
        } */);
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
           /*  $scope._calcTotalPayable(); */
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
            url: url ? url :"/_inc/pos.php?action_type=PRODUCTLIST&query_string=" + productCode + "&category_id=" + categoryId + "&field=p_name&page="+page,
            method: "GET",
            cache: false,
            processData: false,
            contentType: false,
            dataType: "json"
        }).
        then(function(response) {
            $scope.productArray = [];
            window.angular.forEach(response.data.products, function(productItem, key) {
              if (productItem) {
                var find = window._.find($scope.productArray, function (item) {
                    return item.p_id == productItem.p_id;
                });
                if (!find) {
                    $scope.productArray.push(productItem);
                }
              }
            });
            $("#item-list").perfectScrollbar('update');
            $scope.totalProduct = parseInt($scope.productArray.length);
            $scope.showLoader = !1;
            if ($scope.totalProduct == 1 && productCode) {
                window.angular.forEach(response.data.products, function(productItem, key) {
                  if (productItem) {
                    $scope.addItemToInvoice(productItem.p_code);
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
            if (window.store.sound_effect == 1) {
                window.storeApp.playSound("error.mp3");
            }
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

    $scope.CustomerEditModal = function() {
        $scope.customer_name = $scope.customerName;
        $scope.customer_id = $scope.customerId;
        CustomerEditModal($scope);
    };

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
});
