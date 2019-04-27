$(document).ready(function () {
    var DOMAIN = "http://localhost/inv_project/public_html";

    addNewRow();

    $("#add").click(function () {
        addNewRow();
    })

    function addNewRow() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {getNewOrderItem: 1},
            success: function (data) {
                $("#invoice_item").append(data);
                var n = 0;
                $(".number").each(function () {
                    $(this).html(++n);
                })
            }
        })
    }

    $("#remove").click(function () {
        $("#invoice_item").children("tr:last").remove();
        calculate(0, 0);
    })

    $("#invoice_item").delegate(".pid", "change", function () {
        var pid = $(this).val();
        var tr = $(this).parent().parent();
        $(".overlay").show();
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {getPriceAndQty: 1, id: pid},
            success: function (data) {
                tr.find(".tqty").val(data["product_stock"]);
                tr.find(".pro_name").val(data["product_name"]);
                tr.find(".qty").val(1);
                tr.find(".price").val(data["product_price"]);
                tr.find(".amt").html(tr.find(".qty").val() * tr.find(".price").val());
                calculate(0, 0);
            }
        })
    })

    $("#invoice_item").delegate(".qty", "keyup", function () {
        var qty = $(this);
        var tr = $(this).parent().parent();
        if (isNaN(qty.val())) {
            alert("S'il vous plaît entrer une quantité valide");
            qty.val(1);
        } else {
            if ((qty.val() - 0) > (tr.find(".tqty").val() - 0)) {
                alert("Pardon ! Cette quantité n'est pas disponible dans le Stock!");
                aty.val(1);
            } else {
                tr.find(".amt").html(qty.val() * tr.find(".price").val());
                calculate(0, 0);
            }
        }

    })

    function calculate(dis, paid) {
        var sub_total = 0;
        var gst = 0;
        var net_total = 0;
        var discount = dis;
        var paid_amt = paid;
        var due = 0;
        $(".amt").each(function () {
            sub_total = sub_total + ($(this).html() * 1);
        })
        gst = 0.2 * sub_total;
        net_total = gst + sub_total;
        net_total = net_total - discount;
        due = net_total - paid_amt;
        $("#gst").val(gst);
        $("#sub_total").val(sub_total);

        $("#discount").val(discount);
        $("#net_total").val(net_total);
        //$("#paid")
        $("#due").val(due);

    }

    $("#discount").keyup(function () {
        var discount = $(this).val();
        calculate(discount, 0);
    })

    $("#paid").keyup(function () {
        var paid = $(this);
        if (isNaN(paid.val())) {
            alert("S'il vous plaît entrer un Montant valide");
            paid.val("");
        } else if (paid.val() * 1 > $("#net_total").val() * 1) {
            paid.val(paid.val().slice(0, -1));
        } else {
            var discount = $("#discount").val();
            calculate(discount, paid.val());
        }
    })


    /*Order Accepting*/

    $("#order_form").click(function () {

        var invoice = $("#get_order_data").serialize();
        var sucess = $("#order_form");
        var print = $("#print_invoice");
        var statue = true;

        var ice_reg = new RegExp(/^[0-9]{15}$/);

        var rows = $("#invoice_item tr");
        for (var i = 0; i < rows.length - 1; i++) {
            if ($(rows[i]).find("td").find("select").val() == $(rows[i + 1]).find("td").find("select").val())
            {
                alert("vous avez sélectionné le même produit deux fois, nous le corrigerons pour vous!")
                $(rows[i + 1]).remove();
                statue = false;
            }
        }
        if ($("#type_client").val() != "Personne") {
            //alert("Hola");
            if (!ice_reg.test($("#numero").val())) {
                alert("Veuillez entrer un ICE valide (15 chiffres)");
                statue = false;
            }
        }


        if (statue == true) {
            if ($("#cust_name").val() === "") {
                alert("S'il vous plaît entrer le nom du client.");
            } else if (($("#invoice_item").children().length === 0)) {
                alert("S'il vous plaît Choisir un produit pour commander.");
                $("#add").trigger('click');
            } else if ($("#product_select").val() === "") {
                alert("S'il vous plaît Choisir un produit pour commander.");
            } else {
                $.ajax({
                    url: DOMAIN + "/includes/process.php",
                    method: "POST",
                    data: $("#get_order_data").serialize(),
                    success: function (data) {

                        if (data == "ORDER_FAIL_TO_COMPLETE") {
                            alert("Quantite Non Disponible ");

                        } else if (data < 0) {
                            alert(data);
                        } else {
                            $("#get_order_data").trigger("reset");

                            alert("Facture bien Enregistrer");

                            if (confirm("Tu veux imprimer Un Devis!?")) {
                                sucess.addClass("d-none");
                                print.removeClass("d-none");
                            }

                            $("#print_invoice").click(function () {
                                window.location.href = DOMAIN + "/includes/devis_in_create.php?invoice_no=" + data + "&" + invoice;
                                sucess.removeClass("d-none");
                                print.addClass("d-none");
                            })
                        }
                    }
                });
            }
        }
    });

    $("#type_client").on("change", function () {
        if ($(this).val() == "Personne") {
            $("#numero_div").addClass("d-none");
        } else {
            $("#numero_div").removeClass("d-none");
        }
    })
});