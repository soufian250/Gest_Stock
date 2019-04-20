$(document).ready(function () {
    var DOMAIN = "http://localhost/inv_project/public_html";

    //Fetch category
    fetch_category();
    function fetch_category() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {getCategory: 1},
            success: function (data) {
                var choose = "<option value=''>Choisissez une catégorie</option>";
                $("#select_cat").html(choose + data);
                $("#select_ucat").html(choose + data);
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
                $("#update_supcat").html(root + data);
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
                $("#select_ufour").html(choose + data);
            }
        })
    }

//---------------------Category-----------------

//Add Category
    $("#category_form").on("submit", function () {
        if ($("#category_name").val() == "") {
            $("#category_name").addClass("border-danger");
            $("#cat_error").html("<span class='text-danger'>Veuillez entrer le nom de la catégorie</span>");
        } else {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#category_form").serialize(),
                success: function (data) {
                    if (data == "CATEGORY_ADDED") {
                        $("#category_name").removeClass("border-danger");
                        $("#category_name").val("");
                        $("#parent_cat").val("");
                        $("#alertmsg").html("La Categorie Ajouté Avec Succès                                 <button id='close' type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                        $("#alertmsg").removeClass("d-none");
                        $('#form_category').modal('toggle');
                        fetch_pcategory();
                        fetch_category();
                        manageCategory(1);
                    } else {
                        alert(data);
                    }
                }
            })
        }
    })

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
        if (confirm("Êtes-vous sûr ? Vous voulez supprimer!")) {
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
                $("#update_supcat").val(data["parent_cat"]);
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
                    manageCategory(1);
                    $('#form_update_Category').modal('toggle');
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
    //Add product
    $("#product_form").on("submit", function () {
        var statusn = false;
        var statusc = false;
        var statusf = false;
        var statusdes = false;
        var statuspa = false;
        var statuspv = false;
        var statusq = false;
        //var image = $("#image");
        var name = $("#product_name");
        var selectCat = $("#select_cat");
        var selectFour = $("#select_four");
        var des = $("#product_des");
        var prixachat = $("#product_pprice");
        var prix = $("#product_price");
        var quantite = $("#product_qty");
        var e_patt = new RegExp(/^[1-9]{1}[0-9]*$/);
        if (name.val() == "") {
            name.addClass("border-danger");
            $("#np_error").html("<span class='text-danger'>Entrer le nom de la Categorie</span>");
            statusn = false;
        } else {
            name.removeClass("border-danger");
            $("#np_error").html("");
            statusn = true;
        }
        if (selectCat.val() == "") {
            selectCat.addClass("border-danger");
            $("#cp_error").html("<span class='text-danger'>Veuillez sélectionner la categorie de produit</span>");
            statusc = false;
        } else {
            selectCat.removeClass("border-danger");
            $("#cp_error").html("");
            statusc = true;
        }
        if (selectFour.val() == "") {
            selectFour.addClass("border-danger");
            $("#fp_error").html("<span class='text-danger'>Veuillez sélectionner un Fournisseurt</span>");
            statusf = false;
        } else {
            selectFour.removeClass("border-danger");
            $("#fp_error").html("");
            statusf = true;
        }
        if (des.val() == "") {
            des.addClass("border-danger");
            statusdes = true;
        } else {
            des.removeClass("border-danger");
            statusdes = true;
        }
        if (!e_patt.test(prixachat.val())) {
            prixachat.addClass("border-danger");
            $("#prixpa_error").html("<span class='text-danger'>Le Prix d'achat doit être un entie positive</span>");
            statuspa = false;
        } else {
            prixachat.removeClass("border-danger");
            $("#prixpa_error").html("");
            statuspa = true;
        }
        if (!e_patt.test(prix.val())) {
            prix.addClass("border-danger");
            $("#prixp_error").html("<span class='text-danger'>Le Prix doit être un entie positive</span>");
            statuspv = false;
        } else {
            prix.removeClass("border-danger");
            $("#prixp_error").html("");
            statuspv = true;
        }
        if (!e_patt.test(quantite.val())) {
            quantite.addClass("border-danger");
            $("#qp_error").html("<span class='text-danger'>S'il vous plaît entrer une Quantite valide!</span>");
            statusq = false;
        } else {
            quantite.removeClass("border-danger");
            $("#qp_error").html("");
            statusq = true;
        }

        if (statusn == true && statusc == true && statusf == true && statusdes == true && statuspa == true && statuspv == true && statusq == true)
        {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#product_form").serialize(),
                success: function (data) {
                    if (data == "NEW_PRODUCT_ADDED") {
                        $("#product_des").val("");
                        $("#product_name").val("");
                        $("#select_cat").val("");
                        $("#select_four").val("");
                        $("#product_pprice").val("");
                        $("#product_price").val("");
                        $("#product_qty").val("");
                        $("#alertmsg").html("Le Produit ajouter Avec Succès                                 <button id='close' type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                        $("#alertmsg").removeClass("d-none");
                        manageProduct(1);
                        $('#form_products').modal('toggle');
                        //alert("Le Produit ajouter Avec Succès");
                    } else {
                        console.log(data);
                        alert(data);
                    }

                }
            })
        }
    })
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
                $("#select_ucat").val(data["cid"]);
                $("#select_ufour").val(data["idfour"]);
                $("#product_udes").val(data["description"]);
                $("#product_upprice").val(data["purchase_price"]);
                $("#product_uprice").val(data["product_price"]);
                $("#product_uqty").val(data["product_stock"]);

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
                    manageProduct(1);
                    $('#form_update_products').modal('toggle');

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
                    manageInvoice(1);
                    $("#plpaid").val("");
                    $("#form_invoice").modal("toggle");
                } else {
                    alert("Remplissez le prix supplémentaire s'il vous plaît!");
                }
            }
        })
    })

    function calculate(paid) {
        var paid_amt = 0;
        var due = 0;
        var net_total = 0;
        var montant = 0;
        montant = $("#paid").val();
        net_total = $("#net_total").val();
        var paid_amt = montant * 1 + paid * 1;
        var due = net_total - paid_amt;
        $("#due").val(due);

    }

    $("#plpaid").keyup(function () {
        var paid = $(this);
        if (isNaN(paid.val())) {
            alert("S'il vous plaît entrer un Montant valide");
            paid.val("");
        } else if (paid.val() * 1 + $("#paid").val() * 1 > $("#net_total").val() * 1) {
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

    //Add Employe
    $("#employe_form").on("submit", function () {
        var status = true;
        var status1 = true;
        var status2 = true;
        var status3 = true;

        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var type = $("#usertype");
        var e_patt = new RegExp(/^[A-Za-z0-9_-]+(\.[A-Za-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        if (name.val() == "" || name.val().length < 6) {
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>S'il vous plaît entrer le nom et le nom doit être plus de 6 caractères</span>");
            status1 = false;
        } else {
            name.removeClass("border-danger");
            $("#u_error").html("");
            status1 = true;
        }
        if (!e_patt.test(email.val())) {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Veuillez entrer une adresse email valide</span>");
            status2 = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status2 = true;
        }
        if (pass1.val() == "" || pass1.val().length < 9) {
            pass1.addClass("border-danger");
            $("#p1_error").html("<span class='text-danger'>S'il vous plaît entrer plus de 9 chiffres mot de passe</span>");
            status = false;
        } else {
            pass1.removeClass("border-danger");
            $("#p1_error").html("");
            status = true;
        }
        if (pass2.val() == "" || pass2.val().length < 9) {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Le mot de passe est plus petit que l'autre</span>");
            status = false;
        } else {
            pass2.removeClass("border-danger");
            $("#p2_error").html("");
            status = true;
        }
        if (type.val() == "" || type.val() == "Sélectionner le type de l'utilisateur") {
            type.addClass("border-danger");
            $("#t_error").html("<span class='text-danger'>Veuillez sélectionner le rôle d'utilisateur</span>");
            status3 = false;
        } else {
            type.removeClass("border-danger");
            $("#t_error").html("");
            status3 = true;
        }
        if (status == true && status1 == true && status2 == true && status3 == true) {
            if (pass1.val() == pass2.val()) {
                $(".overlay").show();
                $.ajax({
                    url: DOMAIN + "/includes/process.php",
                    method: "POST",
                    data: $("#employe_form").serialize(),
                    success: function (data) {
                        if (data == "EMAIL_ALREADY_EXISTS") {
                            $(".overlay").hide();
                            alert("On dirait que ton email est déjà utilisé");
                        } else if (data == "SOME_ERROR") {
                            $(".overlay").hide();
                            alert("Vérifier vos entrées s'il manque quelque chose");
                        } else {
                            $("#username").val("");
                            $("#email").val("");
                            $("#password1").val("");
                            $("#password2").val("");
                            $("#usertype").val("");
                            $(".overlay").hide();
                            $("#alertmsg").html("Employe Ajouté Avec Succès                                 <button id='close' type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                            $("#alertmsg").removeClass("d-none");
                            manageUser(1);
                            $('#form_employe').modal('toggle');
                        }
                    }
                })
            } else {
                pass2.addClass("border-danger");
                $("#p2_error").html("<span class='text-danger'>Le mot de passe n'est pas similaire à l'autre</span>");
                status = true;
            }
        }
    })

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
                //alert(data["email"]);
                $("#id").val(data["id"]);
                $("#uuser").val(data["username"]);
                $("#uemail").val(data["email"]);
                $("#uusertype").val(data["usertype"]);
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
                    manageUser(1);
                    $('#update_user').modal('toggle');
                } else {
                    alert(data);
                }
            }
        })
    })

    //get ID for tasks
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
                    $('#update_tasks').modal('toggle');
                } else {
                    alert("Une erreur a été trouvée!");
                }
            }
        })
    })

    //---------------------Fournisseur-----------------
    // create Fournisseur
    $("#fournisseur_form").on("submit", function () {
        var status = true;
        var status1 = true;
        var status2 = true;
        var status3 = true;

        var name = $("#fusername");
        var email = $("#femail");
        var tele = $("#ftele");
        var spec = $("#fspec");
        var e_patt = new RegExp(/^[A-Za-z0-9_-]+(\.[A-Za-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        var t_patt = new RegExp(/^[0]{1}[5,6,7]{1}[0-9]{8}$/);
        if (name.val() == "") {
            name.addClass("border-danger");
            $("#fu_error").html("<span class='text-danger'>S'il vous plaît entrer Le nom de Fournisseur</span>");
            status1 = false;
        } else {
            name.removeClass("border-danger");
            $("#fu_error").html("");
            status1 = true;
        }
        if (!e_patt.test(email.val())) {
            email.addClass("border-danger");
            $("#fe_error").html("<span class='text-danger'>Veuillez entrer une adresse email valide</span>");
            status2 = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status2 = true;
        }
        if (!t_patt.test(tele.val())) {
            tele.addClass("border-danger");
            $("#ft_error").html("<span class='text-danger'>Veuillez entrer un numero de telephone valide</span>");
            status3 = false;
        } else {
            tele.removeClass("border-danger");
            $("#ft_error").html("");
            status3 = true;
        }
        if (spec.val() == "") {
            spec.addClass("border-danger");
            $("#fs_error").html("<span class='text-danger'>S'il vous plaît entrer Le specialite de Fournisseur</span>");
            status = false;
        } else {
            spec.removeClass("border-danger");
            $("#fs_error").html("");
            status = true;
        }


        if (status == true && status1 == true && status2 == true && status3 == true) {
            $(".overlay").show();
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#fournisseur_form").serialize(),
                success: function (data) {
                    if (data == "FOURNISSEUR_ADDED") {
                        $("#fusername").val("");
                        $("#femail").val("");
                        $("#ftele").val("");
                        $("#fspec").val("");
                        $("#alertmsg").html("Le Fournisseur est bien Ajouté                                 <button id='close' type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                        $("#alertmsg").removeClass("d-none");
                        $('#form_fournisseur').modal('toggle');
                        manageFour(1);
                        fetch_four();
                    } else {
                        alert(data);
                    }
                }
            })
        }
    })

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
                $("#fuemail").val(data["email"]);
                $("#futele").val(data["telephone"]);
                $("#fuspec").val(data["specialite"]);
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
                        manageFour(1);
                        $('#update_fournisseur').modal('toggle');
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