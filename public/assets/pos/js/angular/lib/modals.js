
//Modal para crear Cliente
window.angularApp.factory("CustomerCreateModal",["window","jQuery","$http","$uibModal","$sce","$rootScope", function (window,jQuery, $http, $uibModal, $sce, $scope) {
    return function($scope) {
        var uibModalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: "modal-title",
            ariaDescribedBy: "modal-body",
            template: "<div class=\"modal-header\">" +
                            "<button ng-click=\"closeCustomerCreateModal();\" type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" +
                           "<h3 class=\"modal-title\" id=\"modal-title\"><span class=\"fa fa-fw fa-plus\"></span> {{ modal_title }}</h3>" +
                        "</div>" +
                        "<div class=\"modal-body\" id=\"modal-body\">" +
                            "<div bind-html-compile=\"rawHtml\">Loading...</div>" +
                        "</div>",
            controller: function ($scope, $uibModalInstance) {
                $http({
                  url: "/pos/addcliente",
                  method: "GET"
                })
                .then(function(response, status, headers, config) {

                    $scope.modal_title = "Crear un Nuevo Cliente";
                    $scope.rawHtml = $sce.trustAsHtml(response.data);

                   /*  setTimeout(function() {
                        window.storeApp.select2();
                        window.storeApp.datePicker();
                    }, 500); */

                }, function(response) {
                   window.swal("Oops!", response.data.errorMsg, "error");
                });

                // Submit Customer Form
                $(document).delegate("#create-customer-submit", "click", function(e) {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();

                    var $tag = $(this);
                    var $btn = $tag.button("loading");
                    var form = $($tag.data("form"));
                    form.find(".alert").remove();
                    var actionUrl = form.attr("action");

                    $http({
                        url: window.baseUrl + "/_inc/" + actionUrl,
                        method: "POST",
                        data: form.serialize(),
                        cache: false,
                        processData: false,
                        contentType: false,
                        dataType: "json"
                    }).
                    then(function(response) {
                        $btn.button("reset");
                        var alertMsg = "<div class=\"alert alert-success\">";
                        alertMsg += "<p><i class=\"fa fa-check\"></i> " + response.data.msg + ".</p>";
                        alertMsg += "</div>";
                        form.find(".box-body").before(alertMsg);

                        // Alert
                        window.swal("Success", response.data.msg, "success")
                        .then(function(value) {

                            $scope.customerMobileNumber = response.data.customer_contact;
                            $scope.customerName = response.data.customer_name + " (" + $scope.customerMobileNumber + ")";
                            $scope.customerId = response.data.id;
                            $scope.dueAmount = response.data.due_amount;

                            $(document).find("input[name=\"customer-name\"]").val(response.data.customer_name + ' (' + response.data.customer_contact + ')');
                            $(document).find("input[name=\"customer-id\"]").val(response.data.id);

                            // increase customer count
                            var customerCount = $(document).find("#customer-count h3");
                            if (customerCount) {
                                customerCount.text(parseInt(customerCount.text()) + 1);
                            }

                            // close modalwindow
                            $scope.closeCustomerCreateModal();
                            $(document).find(".close").trigger("click");

                            // Callback
                            if ($scope.CustomerCreateModalCallback) {
                                $scope.CustomerCreateModalCallback($scope);
                            }
                        });

                    }, function(response) {
                        $btn.button("reset");
                        var alertMsg = "<div class=\"alert alert-danger\">";
                        window.angular.forEach(response.data, function(value, key) {
                            alertMsg += "<p><i class=\"fa fa-warning\"></i> " + value + ".</p>";
                        });
                        alertMsg += "</div>";
                        form.find(".box-body").before(alertMsg);
                        $(":input[type=\"button\"]").prop("disabled", false);
                        window.swal("Oops!", response.data.errorMsg, "error");
                    });
                });

                $scope.closeCustomerCreateModal = function () {
                    $uibModalInstance.dismiss("cancel");
                };
            },
            scope: $scope,
            size: "md",
            backdrop: "static",
            keyboard: true,
        });

        uibModalInstance.result.catch(function () {
            uibModalInstance.close();
        });
    };
}]);

//Modal para Editar Cliente
window.angularApp.factory("CustomerEditModal", ["window","jQuery","$http","$uibModal","$sce","$rootScope", function ( window, jQuery, $http, $uibModal, $sce, $scope) {
    return function(customer) {
        var customerId;
        var uibModalInstance = $uibModal.open({
            animation: true,
            ariaLabelledBy: "modal-title",
            ariaDescribedBy: "modal-body",
            template: "<div class=\"modal-header\">" +
                            "<button ng-click=\"closeCustomerEditModal();\" type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>" +
                           "<h3 class=\"modal-title\" id=\"modal-title\"><span class=\"fa fa-fw fa-pencil\"></span> {{ modal_title }}</h3>" +
                        "</div>" +
                        "<div class=\"modal-body\" id=\"modal-body\">" +
                            "<div bind-html-compile=\"rawHtml\">Loading...</div>" +
                        "</div>",
            controller: function ($scope, $uibModalInstance) {
                $http({
                  url:  "/pos/editcliente/" + customer.customer_id,
                  method: "GET"
                })
                .then(function(response, status, headers, config) {
                    $scope.modal_title = customer.customer_name;
                    $scope.rawHtml = $sce.trustAsHtml(response.data);
/*
                    setTimeout(function() {
                        window.storeApp.select2();
                        window.storeApp.datePicker();
                    }, 100);
 */
                }, function(response) {
                   window.swal("Oops!", response.data.errorMsg, "error");
                });

                $(document).delegate("#customer-update", "click", function(e) {

                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();

                    var $tag = $(this);
                    var $btn = $tag.button("loading");
                    var form = $($tag.data("form"));
                    var datatable = $tag.data("datatable");
                    form.find(".alert").remove();
                    var actionUrl = form.attr("action");
                    $http({
                        url: window.baseUrl + "/_inc/" + actionUrl,
                        method: "POST",
                        data: form.serialize(),
                        cache: false,
                        processData: false,
                        contentType: false,
                        dataType: "json"
                    }).
                    then(function(response) {
                        $btn.button("reset");
                        var alertMsg = "<div class=\"alert alert-success\">";
                        alertMsg += "<p><i class=\"fa fa-check\"></i> " + response.data.msg + ".</p>";
                        alertMsg += "</div>";
                        form.find(".box-body").before(alertMsg);

                        // Alert
                        window.swal({
                          title: "Success!",
                          text: response.data.msg,
                          icon: "success",
                          buttons: true,
                          dangerMode: false,
                        })
                        .then(function (willDelete) {
                            if (willDelete) {
                                $scope.closeCustomerEditModal();
                                $(document).find(".close").trigger("click");
                                customerId = response.data.id;

                                $(datatable).DataTable().ajax.reload(function(json) {
                                    if ($("#row_"+customerId).length) {
                                        $("#row_"+customerId).flash("yellow", 5000);
                                    }
                                }, false);

                            } else {
                                $(datatable).DataTable().ajax.reload(null, false);
                            }

                            // Callback
                            if ($scope.CustomerEditModalCallback) {
                                $scope.CustomerEditModalCallback($scope);
                            }
                        });

                    }, function(response) {

                        $btn.button("reset");
                        var alertMsg = "<div class=\"alert alert-danger\">";
                        window.angular.forEach(response.data, function(value, key) {
                            alertMsg += "<p><i class=\"fa fa-warning\"></i> " + value + ".</p>";
                        });
                        alertMsg += "</div>";
                        form.find(".box-body").before(alertMsg);
                        $(":input[type=\"button\"]").prop("disabled", false);
                        window.swal("Oops!", response.data.errorMsg, "error");
                    });
                });
                $scope.closeCustomerEditModal = function () {
                    $uibModalInstance.dismiss("cancel");
                };
            },
            scope: $scope,
            size: "md",
            backdrop  : "static",
            keyboard: true,
        });

        uibModalInstance.result.catch(function () {
            uibModalInstance.close();
        });
    };
}]);
