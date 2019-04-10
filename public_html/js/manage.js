$(document).ready(function () {
    var DOMAIN = "http://localhost/inv_project/public_html";

    //Manage Category
    manageCategory(1);
    function manageCategory(pn) {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageCategory: 1, pageno: pn},
            success: function (data) {
                $("#get_category").html(data);
            }
        })
    }


    $("body").delegate(".page-link", "click", function () {
        var pn = $(this).attr("pn");
        manageCategory(pn);
    })

    $("body").delegate(".del_cat", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Are you sure ? You want to delete..!")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {deleteCategory: 1, id: did},
                success: function (data) {
                    if (data == "DEPENDENT_CATEGORY") {
                        alert("Pardon ! cette catégorie dépend d'autres sous-catégories");
                    } else if (data == "CATEGORY_DELETED") {
                        alert("Catégorie supprimée avec succès.!");
                        manageCategory(1);

                    } else {
                        alert(data);
                    }

                }
            })
        }
    })

    //Fetch category
    fetch_category();
    function fetch_category() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {getCategory: 1},
            success: function (data) {
                var choose = "<option value=''>Choose Category</option>";
                $("#select_cat").html(choose + data);
            }
        })
    }

    fetch_pcategory();
    function fetch_pcategory() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {getParentCategory: 1},
            success: function (data) {
                var root = "<option value='0'>None</option>";
                $("#parent_cat").html(root + data);
            }
        })
    }

    //Fetch Brand
    fetch_brand();
    function fetch_brand() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {getBrand: 1},
            success: function (data) {
                var choose = "<option value=''>Choose Brand</option>";
                $("#select_brand").html(choose + data);
            }
        })
    }

    //Fetch Fournisseur
    fetch_four();
    function fetch_four() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {getFour: 1},
            success: function (data) {
                var choose = "<option value=''>Choisir un Fournisseur</option>";
                $("#select_four").html(choose + data);
            }
        })
    }

    //Update Category
    $("body").delegate(".edit_cat", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateCategory: 1, id: eid},
            success: function (data) {
                console.log(data);
                $("#cid").val(data["cid"]);
                $("#update_category").val(data["category_name"]);
                $("#parent_cat").val(data["parent_cat"]);
            }
        })
    })

    $("#update_category_form").on("submit", function () {
        if ($("#update_category").val() == "") {
            $("#update_category").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Please Enter Category Name</span>");
        } else {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#update_category_form").serialize(),
                success: function (data) {
                    window.location.href = "";
                }
            })
        }
    })


    //----------Brand-------------
    manageBrand(1);
    function manageBrand(pn) {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageBrand: 1, pageno: pn},
            success: function (data) {
                $("#get_brand").html(data);
            }
        })
    }

    $("body").delegate(".page-link", "click", function () {
        var pn = $(this).attr("pn");
        manageBrand(pn);
    })

    $("body").delegate(".del_brand", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Are you sure ? You want to delete..!")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {deleteBrand: 1, id: did},
                success: function (data) {
                    if (data == "DELETED") {
                        alert("Brand is deleted");
                        manageBrand(1);
                    } else {
                        alert(data);
                    }

                }
            })
        }
    })

    //Update Brand
    $("body").delegate(".edit_brand", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateBrand: 1, id: eid},
            success: function (data) {
                console.log(data);
                $("#bid").val(data["bid"]);
                $("#update_brand").val(data["brand_name"]);
            }
        })
    })

    $("#update_brand_form").on("submit", function () {
        if ($("#update_brand").val() == "") {
            $("#update_brand").addClass("border-danger");
            $("#brand_error").html("<span class='text-danger'>Please Enter Brand Name</span>");
        } else {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#update_brand_form").serialize(),
                success: function (data) {
                    if (data == "DELETED") {
                        alert("L'Type est modifier avec succès.!");
                        window.location.href = "";
                    } else
                        alert(data);
                }
            })
        }
    })


    //---------------------Products-----------------
    manageProduct(1);
    function manageProduct(pn) {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageProduct: 1, pageno: pn},
            success: function (data) {
                $("#get_product").html(data);
            }
        })
    }

    $("body").delegate(".page-link", "click", function () {
        var pn = $(this).attr("pn");
        manageProduct(pn);
    })

    $("body").delegate(".del_product", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Êtes-vous sûr ? Vous voulez supprimer!")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {deleteProduct: 1, id: did},
                success: function (data) {
                    if (data == "DELETED") {
                        alert("Le produit est supprimé avec succès");
                        manageProduct(1);
                    } else {
                        alert(data);
                    }

                }
            })
        }
    })

    //Update product
    $("body").delegate(".edit_product", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateProduct: 1, id: eid},
            success: function (data) {
                console.log(data);
                $("#pid").val(data["pid"]);
                $("#update_product").val(data["product_name"]);
                $("#select_cat").val(data["cid"]);
                $("#select_four").val(data["idfour"]);
                $("#product_des").val(data["description"]);
                $("#product_pprice").val(data["purchase_price"]);
                $("#product_price").val(data["product_price"]);
                $("#product_qty").val(data["product_stock"]);

            }
        })
    })

    //Update product
    $("#update_product_form").on("submit", function () {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: $("#update_product_form").serialize(),
            success: function (data) {
                if (data == "UPDATED") {
                    alert("Le produit est modifier avec succès.!");
                    window.location.href = "";
                } else {
                    alert(data);
                }
            }
        })
    })
//Fetch Products for Employer
    consulterProduit();
    function consulterProduit() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {consulterProduct: 1},
            success: function (data) {
                $("#get_p_consulter").html(data);
            }
        })
    }

    //---------------------Invoice-----------------

    manageInvoice(1);
    function manageInvoice(pn) {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageInvoice: 1, pageno: pn},
            success: function (data) {
                $("#get_invoice").html(data);
            }
        })
    }

    $("body").delegate(".page-link", "click", function () {
        var pn = $(this).attr("pn");
        manageInvoice(pn);
    })
    /*
     $("body").delegate(".del_invoice","click",function(){
     var did = $(this).attr("did");
     if (confirm("Are you sure ? You want to delete..!")) {
     $.ajax({
     url : DOMAIN+"/includes/process.php",
     method : "POST",
     data : {deleteProduct:1,id:did},
     success : function(data){
     if (data == "DELETED") {
     alert("Product is deleted");
     manageProduct(1);
     }else{
     alert(data);
     }
     
     }
     })
     }
     })
     
     */
    //Update Invoice
    $("body").delegate(".edit_invoice", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateInvoice: 1, id: eid},
            success: function (data) {
                console.log(data);
                $("#invoice_id").val(data["invoice_no"]);
                $("#net_total").val(data["net_total"]);
                $("#paid").val(data["paid"]);
                $("#due").val(data["due"]);
            }
        })
    })

    //Update Invoice
    $("#update_invoice_form").on("submit", function () {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: $("#update_invoice_form").serialize(),
            success: function (data) {
                if (data == "UPDATED") {
                    alert("Le Mis à Jour bien Effectuer ..!");
                    window.location.href = "";
                } else {
                    alert(data);
                }
            }
        })
    })

    function calculate(paid) {
        var paid_amt = 0;
        var due = 0;
        var net_total = 0;
        net_total = $("#net_total").val();
        var paid_amt = paid;
        var due = net_total - paid_amt;

        $("#due").val(due);

    }

    $("#paid").keyup(function () {
        var paid = $(this);
        if (isNaN(paid.val())) {
            alert("S'il vous plaît entrer un Montant valide");
            paid.val("");
        } else if (paid.val() * 1 > $("#net_total").val() * 1) {
            alert("Pardon ! Cet Montant est Invalide!");
            paid.val("")
        } else {
            calculate(paid.val());
        }
    })

    $("body").delegate(".print_facture", "click", function () {
        var id_facture = $(this).attr("fid");
        window.location.href = DOMAIN + "/includes/invoice_bill.php?id_facture=" + id_facture;
    })

    $("body").delegate(".print_devis", "click", function () {
        var id_devis = $(this).attr("fid");
        window.location.href = DOMAIN + "/includes/devis_bill.php?id_devis=" + id_devis;
    })
    //---------------------Users-----------------
    manageUser(1);
    function manageUser(pn) {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageUser: 1, pageno: pn},
            success: function (data) {
                $("#get_user").html(data);
            }
        })
    }

    $("body").delegate(".page-link", "click", function () {
        var pn = $(this).attr("pn");
        manageUser(pn);
    })

    $("body").delegate(".del_user", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Êtes-vous sûr ? Vous voulez supprimer!")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {deleteUser: 1, id: did},
                success: function (data) {
                    if (data == "DELETED") {
                        alert("L'utilisateur est supprimé");
                        manageUser(1);
                    } else {
                        alert(data);
                    }

                }
            })
        }
    })

    //Update User
    $("body").delegate(".edit_user", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateUser: 1, id: eid},
            success: function (data) {
                console.log(data);
                $("#id").val(data["id"]);
                $("#user").val(data["username"]);
                $("#email").val(data["email"]);
                $("#usertype").val(data["usertype"]);


            }
        })
    })

    //Update User
    $("#update_user_form").on("submit", function () {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: $("#update_user_form").serialize(),
            success: function (data) {
                if (data == "UPDATED") {
                    alert("L'Utilisateur est modifier avec succès.!");
                    window.location.href = "";
                } else {
                    alert(data);
                }
            }
        })
    })

    //get ID fro tasks
    $("body").delegate(".edit_tasks", "click", function () {
        var tid = $(this).attr("tid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateUser: 1, id: tid},
            success: function (data) {
                console.log(data);
                $("#tid").val(data["id"]);
            }
        })
    })
    //Update Tasks
    $("#update_tasks_form").on("submit", function () {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: $("#update_tasks_form").serialize(),
            success: function (data) {
                if (data == "UPDATED") {
                    alert("Tâches pour aujourd'hui a été ajouté.!");
                    window.location.href = "";
                } else {
                    alert(data);
                }
            }
        })
    })

    //---------------------Fournisseur-----------------
    manageFour(1);
    function manageFour(pn) {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {manageFour: 1, pageno: pn},
            success: function (data) {
                $("#get_fournisseur").html(data);
            }
        })
    }

    $("body").delegate(".page-link", "click", function () {
        var pn = $(this).attr("pn");
        manageFour(pn);
    })

    $("body").delegate(".del_four", "click", function () {
        var did = $(this).attr("did");
        if (confirm("Êtes-vous sûr ? Vous voulez supprimer!")) {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {deleteFour: 1, id: did},
                success: function (data) {
                    if (data == "DELETED") {
                        alert("Le Fournisseur est supprimé");
                        manageFour(1);
                    } else {
                        alert(data);
                    }

                }
            })
        }
    })

    //Update Fournisseur data
    $("body").delegate(".edit_four", "click", function () {
        var eid = $(this).attr("eid");
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {updateFour: 1, id: eid},
            success: function (data) {
                console.log(data);
                $("#id").val(data["id"]);
                $("#fuser").val(data["fourname"]);
                $("#femail").val(data["email"]);
                $("#futele").val(data["telephone"]);
                $("#fspec").val(data["specialite"]);
            }
        })
    })

    //Update Fournisseur
    $("#update_fournisseur_form").on("submit", function () {
        var tele = $("#futele");
        var status = true;
        var t_patt = new RegExp(/^[0]{1}[5,6,7]{1}[0-9]{8}$/);

        if (!t_patt.test(tele.val())) {
            tele.addClass("border-danger");
            $("#ft_error").html("<span class='text-danger'>Veuillez entrer un numero de telephone valide</span>");
            status = false;
        } else {
            tele.removeClass("border-danger");
            $("#ft_error").html("");
            status = true;
        }
        if (status == true)
        {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#update_fournisseur_form").serialize(),
                success: function (data) {
                    if (data == "UPDATED") {
                        alert("Le Fournisseur est modifier avec succès.!");
                        window.location.href = "";
                    } else {
                        alert(data);
                    }
                }
            })
        }
    })

    $("#search").keyup(function () {
        search_table($(this).val());
    })

    function search_table(value) {
        $("#invoice_table tr").each(function () {
            var found = "false";
            $(this).each(function () {
                if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                    found = "true";
                }
            })
            if (found == "true")
            {
                $(this).show();
            } else
            {
                $(this).hide();
            }
        })
        $("#produit_table tr").each(function () {
            var found = "false";
            $(this).each(function () {
                if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                    found = "true";
                }
            })
            if (found == "true")
            {
                $(this).show();
            } else
            {
                $(this).hide();
            }
        })

    }


})