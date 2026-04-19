$(function () {
    var shipmentTrackingCode = main.getQueryString("code");
    if (shipmentTrackingCode) {
        shipment.getShipmentsTracking(shipmentTrackingCode);
        $('#shippingCode').val(shipmentTrackingCode);
    } else {
        $('.info-card-wrap').hide();
        $('.cargo-info-graphic-wrap').closest('div').hide();
    }
    $("#btn-shipment-movement").hide();
    main.moveView($('#shippingCode'));
});

var shipment = {

    info: {
        "pack-4": {
            "id": "four-pack",
            "steps": {
                "step-1": -67,
                "step-2": -22,
                "step-3": 20,
                "step-4": 65
            }
        },
        "pack-5": {
            "id": "five-pack",
            "steps": {
                "step-1": -75,
                "step-2": -35,
                "step-3": 0,
                "step-4": 35,
                "step-5": 73
            }
        },
        "pack-6": {
            "id": "six-pack",
            "steps": {
                "step-1": -75,
                "step-2": -45,
                "step-3": -15,
                "step-4": 15,
                "step-5": 45,
                "step-6": 75
            }
        }
    },

    variables: {
        IsAbroad: false
    },

    getShipmentsTracking: function (shipmentTrackingCode) {
        if (shipmentTrackingCode) {
            main.loader(main.enums.loaderEnum.Loader, "Loader");
            $('.info-card-wrap').hide();
            $('.cargo-info-graphic-wrap').closest('div').hide();

            $('#shipmentDate').siblings('span').text(Resource.ReleaseDate[main.variables.language]);
            $('#sender').closest('div.module').removeAttr('style');
            $('#estimatedDeliveryDate').closest('div.module').removeAttr('style');

            _serviceProvider.shipmentsTrackingSearch.getDetail(shipmentTrackingCode, main.variables.language)
                .done(function (response) {
                    if (response && response.ErrorMessage === undefined) {
                        if (response.IsAbroad) {
                            shipment.variables.IsAbroad = true;
                            _serviceProvider.shipmentsTrackingAwb.getDetail(response.DocId, main.variables.language)
                                .done(function (response) {
                                    if (response && response.ErrorMessage === undefined) {
                                        $('.info-graphic').removeClass('active-list');
                                        $('#LastProcessCityCountry').text(response.LastProcessCityCountry);
                                        $('#departureCityCounty').text(response.DestinationCountry + "/" + response.DestinationCity);
                                        $('#deliveryCityCounty').text(response.SourceCountry + "/" + response.SourceCity);
                                        $('#receiver').text(response.ReceiverName);
                                        $('#shipmentDate').siblings('span').text(Resource.DocumentDate[main.variables.language]);
                                        $('#shipmentDate').text(response.DocumentDate);
                                        $('#shipmentStatus').text(response.ShipmentStatus);
                                        $('#ProductName').text(response.CargoType);
                                        $('#deliveryUnitNameWrapper').hide();
                                        $('#deliveryUnitTelWrapper').hide();
                                        $('#sender').closest('div.module').css('display', 'none');
                                        $('#estimatedDeliveryDate').closest('div.module').css('display', 'none');
                                        $('#id').closest('div.module').css('display', 'none');
                                        $('#LastProcessCityCountry').closest('div.module').removeAttr("style");
                                        $('.info-card-wrap').show();
                                        $('.cargo-info-graphic-wrap').closest('div').show();
                                        $('#table-shipment-movement').closest('div').removeAttr("style").closest('div.col-lg-12').removeAttr("style");
                                        main.moveView($(".cargo-info-graphic-wrap"));
                                        $('#btn-shipment-movement').css("display", "none");
                                        if (response.IsDelivered) {
                                            $('#receiver').text(response.DeliveredTo).siblings('span').text(Resource.DeliveryTo[main.variables.language]);
                                            $('#estimatedDeliveryDate').text(response.DeliveryDate).siblings('span').text(Resource.DeliveryDate[main.variables.language]);

                                        } else {
                                            $('#receiver').siblings('span').text(Resource.Receiver[main.variables.language]);
                                            $('#estimatedDeliveryDate').siblings('span').text(Resource.EstimatedDeliveryDate[main.variables.language]);

                                        }
                                        if (response.CarrierTrackingRefNo) {
                                            $('#CarrierTrackingRefNo').text(response.CarrierTrackingRefNo);
                                            $('#CarrierTrackingRefNo').closest('div.module').removeAttr('style');
                                        } else {
                                            $('#CarrierTrackingRefNo').closest('div.module').css('display', 'none');
                                        }
                                        if (response.Movements || response.Movements.length > 0) {
                                            var tableTemplate = "";
                                            $.each(response.Movements, function (key, value) {
                                                var orderNo = value.OrderNo,
                                                    eventDate = value.CreationDate,
                                                    cityCountry = value.CityCountry,
                                                    eventExplanation = value.EventExplanation;
                                                if (eventExplanation === null) {
                                                    eventExplanation = "";
                                                }
                                                tableTemplate += "<tr>" +
                                                    "<td class='text-center'>" + orderNo + "</td>" +
                                                    "<td class='text-center'>" + eventDate + "</td>" +
                                                    "<td class='text-center'>" + cityCountry + "</td>" +
                                                    "<td class='text-center'>" + eventExplanation + "</td>" +
                                                    "</tr >";
                                            });
                                            $('#table-shipment-awb-movement tbody').html(tableTemplate);
                                            $("#btn-shipment-movement").show();
                                            $("#table-shipment-movement").hide();
                                        }
                                    }
                                    else {
                                        if (response.ErrorMessage !== undefined) {
                                            delay(function () {
                                                main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                                            }, 400);
                                        } else {
                                            delay(function () {
                                                main.loader(main.enums.loaderEnum.Error, Resource.ThereWasAnErrorRetrievingTheInformation[main.variables.language]);
                                            }, 400);
                                        }
                                        $("#btn-shipment-movement").hide();
                                        $("#table-shipment-movement").hide();
                                    }
                                })
                                .fail(function () {
                                    $("#btn-shipment-movement").hide();
                                    $("#table-shipment-movement").hide();
                                    delay(function () {
                                        main.loader(main.enums.loaderEnum.Error, Resource.ThereWasAnErrorRetrievingTheInformation[main.variables.language]);
                                    }, 400);
                                });

                        }
                        else {
                            shipment.variables.IsAbroad = false;
                            _serviceProvider.shipmentsTracking.getDetail(response.DocId, main.variables.language)
                                .done(function (response) {
                                    if (response && response.ErrorMessage === undefined) {
                                        $('#receiver').text(response.Receiver);
                                        $('#shipmentDate').text(response.ShipmentDate);
                                        $('#sender').text(response.Sender);
                                        $('#deliveryCityCounty').text(response.DeliveryCountyName + "/" + response.DeliveryCityName);
                                        $('#departureCityCounty').text(response.DepartureCountyName + "/" + response.DepartureCityName);
                                        $('#shipmentStatus').text(response.ShipmentStatus);

                                        var paymentType = response.PaymentType == 0 ? Resource.PaidByReceiver[main.variables.language] : Resource.PaidBySender[main.variables.language];
                                        $('#ProductName').html(response.ProductName + '<br>' + paymentType);

                                        $('#deliveryUnitNameWrapper').show();
                                        $('#deliveryUnitName').text(response.DeliveryUnitName);
                                        $('#deliveryUnitTelWrapper').show();
                                        $('#deliveryUnitTel').text(response.DeliveryUnitTel);
                                        $('#id').text(response.Id);
                                        $('#estimatedDeliveryDate').text(response.EstimatedDeliveryDate);
                                        $('.info-graphic').removeClass('active-list');

                                        if (!response.IsDelivered) {
                                            $('#deliveryUnitNameWrapper').addClass('show-branch-detail');
                                            $('#deliveryUnitNameWrapper').attr("data-branch", response.DeliveryUnitId);
                                            $('#deliveryUnitNameWrapper').css("cursor", "pointer");
                                        } else {
                                            $('#deliveryUnitNameWrapper').removeClass('show-branch-detail');
                                            $('#deliveryUnitNameWrapper').removeAttr("data-branch");
                                            $('#deliveryUnitNameWrapper').removeAttr('style');
                                        }

                                        var shipmentInfo = shipment.info["pack-" + response.ShipmentTotalStatusCount];

                                        var isBranchDelivery = response.ShipmentTotalStatusCount == 5 && response.IsAddressDelivery == false ? "-branch" : "";

                                        var kadran = $("#" + shipmentInfo.id + isBranchDelivery)
                                            .addClass('active-list')
                                            .attr("data-step", response.ShipmentStatusCount)
                                            .find(".st3")
                                            .attr("transform", "rotate (0, 345, 375)");

                                        var kadranDerecesi = -90;

                                        var kadranFunc = function () {

                                            kadranDerecesi = kadranDerecesi + 1;

                                            if (kadranDerecesi <= shipmentInfo.steps["step-" + response.ShipmentStatusCount]) {

                                                kadran.attr('transform', 'rotate(' + kadranDerecesi + ', 345, 375)');

                                                setTimeout(kadranFunc, 10);
                                            }
                                        };

                                        setTimeout(kadranFunc, 10);

                                        if (response.IsDelivered) {
                                            $('#receiver').text(response.DeliveredTo).siblings('span').text(Resource.DeliveryTo[main.variables.language]);
                                            $('#estimatedDeliveryDate').text(response.DeliveryDate).siblings('span').text(Resource.DeliveryDate[main.variables.language]);
                                            $('#btn-shipment-movement').css("display", "none");
                                        } else {
                                            $('#receiver').siblings('span').text(Resource.Receiver[main.variables.language]);
                                            $('#estimatedDeliveryDate').siblings('span').text(Resource.EstimatedDeliveryDate[main.variables.language]);
                                            $('#btn-shipment-movement').css("display", "block");
                                        }
                                        $('.info-card-wrap').show();
                                        $('.cargo-info-graphic-wrap').closest('div').show();
                                        $('#id').closest('div.module').removeAttr("style");
                                        $('#LastProcessCityCountry').closest('div.module').css('display', 'none');
                                        $('#CarrierTrackingRefNo').closest('div.module').css('display', 'none');
                                        main.moveView($(".cargo-info-graphic-wrap"));
                                    } else {
                                        if (response.ErrorMessage !== undefined) {
                                            delay(function () {
                                                main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                                            }, 400);
                                        } else {
                                            delay(function () {
                                                main.loader(main.enums.loaderEnum.Error, Resource.ShipmentsUnexpectedError[main.variables.language]);
                                            }, 400);
                                        }

                                        $("#btn-shipment-movement").hide();
                                        $("#table-shipment-movement").hide();
                                    }
                                })
                                .fail(function () {
                                    $("#btn-shipment-movement").hide();
                                    $("#table-shipment-movement").hide();
                                    delay(function () {
                                        main.loader(main.enums.loaderEnum.Error, Resource.ShipmentsUnexpectedError[main.variables.language]);
                                    }, 400);
                                });

                        }
                        delay(function () {
                            main.loader(main.enums.loaderEnum.RemoveLoader, 'Remove');
                        }, 400);

                    } else {
                        delay(function () {
                            if (response.ErrorMessage !== undefined) {
                                main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                            } else {
                                main.loader(main.enums.loaderEnum.Error, Resource.ShipmentsUnexpectedError[main.variables.language]);
                            }
                        }, 400);
                    }
                })
                .fail(function () {
                    main.loader(main.enums.loaderEnum.Error, Resource.ShipmentsUnexpectedError[main.variables.language]);
                });
        } else {
            main.loader(main.enums.loaderEnum.Error, Resource.PleaseEnterTheItemNumber[main.variables.language]);
        }
    },

    searchShipment: function (element) {
        var shipmentTrackingCode = element.val();
        if (shipmentTrackingCode) {
            shipment.getShipmentsTracking(shipmentTrackingCode);
        } else {
            main.loader(main.enums.loaderEnum.Error, Resource.PleaseEnterTheItemNumber[main.variables.language]);
        }
        main.moveView(element);
    },

    getBranchDetails: function (branchId) {
        _serviceProvider.getBranches.getDetail(branchId, main.variables.language)
            .done(function (response) {
                if (response && response.ErrorMessage === undefined) {
                    var geo = response.Latitude + "," + response.Longitude;
                    var key = $("#googleApiKey").val();
                    var template =
                        '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">' +
                        '<h6 class="main-title-bold">' + Resource.Address[main.variables.language] + '</h6>' +
                        '<p class="main-title-soft">' + response.Address + '</p>' +
                        '<h6 class="main-title-bold">' + Resource.Phone[main.variables.language] + '</h6>' +
                        '<p class="main-title-soft">' + response.PhoneMain + ' </p> ' +
                        '<p  class="main-title-soft">' + response.PhoneAlternate + ' </p> ' +
                        '</div><div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><iframe width="100%" height="150px" frameborder="0" style="border:0" src="' + key +
                        geo +
                        '" allowfullscreen=""></iframe><div class="form-group"></div></div>';

                    $("#branchDetailPopup").html(template);
                }
            }
            );
    },

    shipmentMovement: function (shipmentTrackingCode) {
        _serviceProvider.shipmentsTrackingMovement.getDetail(shipmentTrackingCode, main.variables.language)
            .done(function (response) {
                if (response.ErrorMessage === undefined && response && response.length > 0) {
                    var tableTemplate = "";
                    $.each(response, function (key, value) {
                        var orderNo = value.OrderNo,
                            eventDate = value.EventDate,
                            branch = value.Branch,
                            status = value.Description,
                            description = value.DetailDescription;

                        tableTemplate += "<tr><td class='text-center'>" +
                            orderNo +
                            "</td><td class='text-center'>" +
                            eventDate +
                            "</td><td class='text-center'>" +
                            branch +
                            "</td><td class='text-center'>" +
                            status +
                            "</td><td class='text-center'>" +
                            description +
                            "</td></tr >";
                    });
                    $('#table-shipment-movement tbody').html(tableTemplate);
                    $('#table-shipment-movement').closest('div').css("display", "block").closest('div').css("display", "block");
                    $("#btn-shipment-movement").hide();
                    $("#table-shipment-awb-movement").hide();
                    $('#table-shipment-movement').show();
                }
                else {
                    if (response.ErrorMessage !== undefined) {
                        main.loader(main.enums.loaderEnum.Error, response.ErrorMessage);
                    }
                    else {
                        main.loader(main.enums.loaderEnum.Error, Resource.ShipmentsUnexpectedError[main.variables.language]);
                    }
                }
            })
            .fail(function () {
                main.loader(main.enums.loaderEnum.Error, Resource.ShipmentsUnexpectedError[main.variables.language]);
            });

        main.removeLoader();
    }
};

$("#btn-shipping-code").on("click", function () {
    $('#btn-shipment-movement').css("display", "none");
    var value = $('#shippingCode').val();
    if (value.length === 12 || value.length === 16) {
        shipment.searchShipment($("#shippingCode"));
        $(this).closest('div.form-group').removeClass("error");
    }
    else {
        $(this).closest('div.form-group').addClass("error");
    }
    $('#table-shipment-movement').closest('div').removeAttr("style").closest('div.col-lg-12').removeAttr("style");
});

$("#deliveryUnitNameWrapper").on("click", function () {
    if ($(this).attr("data-branch") > 0) {
        $('#branch-detail-service').modal('show');
        shipment.getBranchDetails($(this).attr("data-branch"));
    }
});

$('#shippingCode').keyup(function (e) {

    this.value = this.value.replace(/[^0-9\.]/g, '');
    if (e.keyCode === 13) {
        if (this.value.length === 12 || this.value.length === 16) {
            shipment.searchShipment($(this));
            $(this).closest('div.form-group').removeClass("error");
        } else {
            $(this).closest('div.form-group').addClass("error");
        }
        $('#table-shipment-movement').closest('div').removeAttr("style").closest('div.col-lg-12').removeAttr("style");
    }
});

$("#btn-shipment-movement").click(function () {
    if (shipment.variables.IsAbroad) {
        $('#table-shipment-awb-movement').closest('div').css("display", "block").closest('div').css("display", "block");
        $("#btn-shipment-movement").hide();
    } else {
        main.addLoader();
        var value = $('#shippingCode').val();
        shipment.shipmentMovement(value);
    }
});