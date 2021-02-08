var angularApp = window.angular.module("angularApp", []);
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
   /*  $scope.orderData.store_name = window.store.name;
    $scope.orderData.header = "\nOrder\n\n";
    $scope.billData.store_name = window.store.name;
    $scope.billData.header = "\nBill\n\n";
    $scope.billData.footer = "\nMerchant Copy\n\n"; */

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
            console.log(response);
            $scope.hideCustomerDropdown = false;
            $scope.customerArray = [];
            window.angular.forEach(response.data, function(customerItem, key) {
                if (customerItem) {
                    console.log(customerItem);
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
  /*   if (window.getParameterByName("customer_id")) {
        $scope.addCustomer(window.getParameterByName("customer_id"));
    } else {
        // add walking customer to invoice
        $scope.addCustomer(1);
    } */
});
