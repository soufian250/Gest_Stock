$(document).ready(function () {
    var DOMAIN = "http://localhost/inv_project/public_html";
    $("#register_form").on("submit", function () {
        var status = true;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var type = $("#usertype");
        //rizwan@gmail.com
        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        if (name.val() == "" || name.val().length < 6) {
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>S'il vous plaît entrer le nom et le nom doit être plus de 6 caractères</span>");
            status = false;
        } else {
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }
        if (!e_patt.test(email.val())) {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Veuillez entrer une adresse email valide</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
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
            status = false;
        } else {
            type.removeClass("border-danger");
            $("#t_error").html("");
            status = true;
        }
        if ((pass1.val() == pass2.val()) && status == true) {
            $(".overlay").show();
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#register_form").serialize(),
                success: function (data) {
                    if (data == "EMAIL_ALREADY_EXISTS") {
                        $(".overlay").hide();
                        alert("On dirait que ton email est déjà utilisé");
                    } else if (data == "SOME_ERROR") {
                        $(".overlay").hide();
                        alert("Vérifier vos entrées s'il manque quelque chose");
                    } else {
                        $(".overlay").hide();
                        window.location.href = encodeURI(DOMAIN + "/index.php?msg=Vous êtes inscrit maintenant vous pouvez vous connecter");
                    }
                }
            })
        } else {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Le mot de passe n'est pas similaire à l'autre</span>");
            status = true;
        }
    })
    $("#employe_form").on("submit", function () {
        var status = true;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var type = $("#usertype");

        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
        if (name.val() == "" || name.val().length < 6) {
            name.addClass("border-danger");
            $("#u_error").html("<span class='text-danger'>S'il vous plaît entrer le nom et le nom doit être plus de 6 caractères</span>");
            status = false;
        } else {
            name.removeClass("border-danger");
            $("#u_error").html("");
            status = true;
        }
        if (!e_patt.test(email.val())) {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>Veuillez entrer une adresse email valide</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
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
            status = false;
        } else {
            type.removeClass("border-danger");
            $("#t_error").html("");
            status = true;
        }
        if ((pass1.val() == pass2.val()) && status == true) {
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
                        $(".overlay").hide();
                        window.location.href = encodeURI(DOMAIN + "/dashboard.php?msg=Employe Ajouté Avec Succès");
                    }
                }
            })
        } else {
            pass2.addClass("border-danger");
            $("#p2_error").html("<span class='text-danger'>Le mot de passe n'est pas similaire à l'autre</span>");
            status = true;
        }
    })
    $("#close").on("click", function () {
        window.location.href = encodeURI(DOMAIN + "/dashboard.php");
    })

    //For Login Part
    $("#form_login").on("submit", function () {
        var email = $("#log_email");
        var pass = $("#log_password");
        var status = false;
        if (email.val() == "") {
            email.addClass("border-danger");
            $("#e_error").html("<span class='text-danger'>S'il vous plaît entrer l'adresse email</span>");
            status = false;
        } else {
            email.removeClass("border-danger");
            $("#e_error").html("");
            status = true;
        }
        if (pass.val() == "") {
            pass.addClass("border-danger");
            $("#p_error").html("<span class='text-danger'>Veuillez entrer le mot de passe</span>");
            status = false;
        } else {
            pass.removeClass("border-danger");
            $("#p_error").html("");
            status = true;
        }
        if (status) {
            $(".overlay").show();
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#form_login").serialize(),
                success: function (data) {
                    if (data == "NOT_REGISTERD") {
                        $(".overlay").hide();
                        email.addClass("border-danger");
                        $("#e_error").html("<span class='text-danger'>On dirait que tu n'es pas inscrit.</span>");
                    } else if (data == "PASSWORD_NOT_MATCHED") {
                        $(".overlay").hide();
                        pass.addClass("border-danger");
                        $("#p_error").html("<span class='text-danger'>S'il vous plaît entrer le mot de passe correct</span>");
                        status = false;
                    } else {
                        $(".overlay").hide();
                        console.log(data);
                        window.location.href = DOMAIN + "/dashboard.php";
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
                var root = "<option value='0'>None</option>";
                var choose = "<option value=''>Choisir une Categorie</option>";
                $("#parent_cat").html(root + data);
                $("#select_cat").html(choose + data);
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
                var choose = "<option value=''>Choisir un Type</option>";
                $("#select_brand").html(choose + data);
            }
        })
    }

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
                        fetch_category();
                        window.location.href = encodeURI(DOMAIN + "/dashboard.php?msg=La Categorie Ajouté Avec Succès");
                    } else {
                        alert(data);
                    }
                }
            })
        }
    })


    //Add Brand
    $("#brand_form").on("submit", function () {
        if ($("#brand_name").val() == "") {
            $("#brand_name").addClass("border-danger");
            $("#brand_error").html("<span class='text-danger'>Veuillez entrer le nom de le type</span>");
        } else {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#brand_form").serialize(),
                success: function (data) {
                    if (data == "BRAND_ADDED") {
                        $("#brand_name").removeClass("border-danger");
                        $("#brand_name").val("");
                        fetch_brand();
                        window.location.href = encodeURI(DOMAIN + "/dashboard.php?msg=Le Type Ajouté Avec Succès");
                    } else {
                        alert(data);
                    }

                }
            })
        }
    })

    //Add product
    $("#product_form").on("submit", function () {
        var status = false;
        //var image = $("#image");
        var name = $("#product_name");
        var selectProduit = $("#select_cat");
        var selectType = $("#select_Type");
        var prix = $("#product_price");
        var quantite = $("#product_qty");
        var e_patt = new RegExp(/^[1-9]{1}[0-9]*$/);

        if (name.val() == "") {
            name.addClass("border-danger");
            $("#n_error").html("<span class='text-danger'>Entrer le nom de la Categorie</span>");
            status = false;
        } else {
            name.removeClass("border-danger");
            $("#n_error").html("");
            status = true;
        }
        if (selectProduit.val() == "" || selectProduit.val() == "Choisir une Categorie") {
            selectProduit.addClass("border-danger");
            $("#c_error").html("<span class='text-danger'>Veuillez sélectionner la categorie de produit</span>");
            status = false;
        } else {
            selectProduit.removeClass("border-danger");
            $("#c_error").html("");
            status = true;
        }
        if (selectType.val() == "") {
            selectType.addClass("border-danger");
            $("#st_error").html("<span class='text-danger'>Veuillez sélectionner le type de produit</span>");
            status = false;
        } else {
            selectType.removeClass("border-danger");
            $("#t_error").html("");
            status = true;
        }
        if (!e_patt.test(prix.val())) {
            prix.addClass("border-danger");
            $("#prix_error").html("<span class='text-danger'>Le Prix doit être un entie positive</span>");
            status = false;
        } else {
            prix.removeClass("border-danger");
            $("#prix_error").html("");
            status = true;
        }
        if (!e_patt.test(quantite.val())) {
            quantite.addClass("border-danger");
            $("#q_error").html("<span class='text-danger'>La Quantite doit être un entie positive</span>");
            status = false;
        } else {
            quantite.removeClass("border-danger");
            $("#q_error").html("");
            status = true;
        }

        if (status)
        {
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: $("#product_form").serialize(),
                success: function (data) {
                    if (data == "NEW_PRODUCT_ADDED") {
                        $("#product_name").val("");
                        $("#select_cat").val("");
                        $("#select_brand").val("");
                        $("#product_price").val("");
                        $("#product_qty").val("");
                        window.location.href = encodeURI(DOMAIN + "/dashboard.php?msg=Le Produit ajouter Avec Succès");
                        //alert("Le Produit ajouter Avec Succès");

                    } else {
                        console.log(data);
                        alert(data);
                    }

                }
            })
        }
    })

    //Edit profile
    $("#profil_form").on("submit", function () {

        var statuse = false;
        var statusn = false;
        var status = false;
        var email = $("#pemail");
        var name = $("#usernamen");
        var pass1 = $("#passwordf");
        var passn = $("#passwordnew");
        var pass2 = $("#passwords");

        var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

        if (!e_patt.test(email.val())) {
            email.addClass("border-danger");
            $("#pe_error").html("<span class='text-danger'>Veuillez entrer une adresse email valide</span>");
            statuse = false;
        } else {
            email.removeClass("border-danger");
            $("#pe_error").html("");
            statuse = true;
        }
        if (name.val() == "" || name.val().length < 6) {
            name.addClass("border-danger");
            $("#pu_error").html("<span class='text-danger'>S'il vous plaît entrer le nom et le nom doit être plus de 6 caractères</span>");
            statusn = false;
        } else {
            name.removeClass("border-danger");
            $("#pu_error").html("");
            statusn = true;
        }
        if (pass1.val() == "" || pass1.val().length < 9) {
            pass1.addClass("border-danger");
            $("#pp1_error").html("<span class='text-danger'>S'il vous plaît entrer plus de 9 chiffres mot de passe</span>");
            status = false;
        } else {
            pass1.removeClass("border-danger");
            $("#pp1_error").html("");
            status = true;
        }
        if (passn.val() == "" || passn.val().length < 9) {
            passn.addClass("border-danger");
            $("#pn_error").html("<span class='text-danger'>S'il vous plaît entrer plus de 9 chiffres mot de passe</span>");
            status = false;
        } else {
            passn.removeClass("border-danger");
            $("#pn_error").html("");
            status = true;
        }

        if (pass2.val() == "" || pass2.val().length < 9) {
            pass2.addClass("border-danger");
            $("#pp2_error").html("<span class='text-danger'>Le mot de passe est plus petit que l'autre</span>");
            status = false;
        } else {
            pass2.removeClass("border-danger");
            $("#pp2_error").html("");
            status = true;
        }
        if (status == true && statuse == true && statusn == true) {
            if (passn.val() == pass2.val()) {
                $(".overlay").show();
                $.ajax({
                    url: DOMAIN + "/includes/process.php",
                    method: "POST",
                    data: $("#profil_form").serialize(),
                    success: function (data) {
                        if (data == "EMAIL_NOT_MATCHED") {
                            $(".overlay").hide();
                            alert("L'Email donner est Inccorect!");
                        } else if (data == "PASSWORD_NOT_EXISTS") {
                            $(".overlay").hide();
                            alert("L'ancien mot de passe est invalide");
                        } else {
                            //alert(data);
                            $(".overlay").hide();
                            window.location.href = encodeURI(DOMAIN + "/dashboard.php?msg=Modification effectuer");
                        }
                    }
                })
            } else {
                pass2.addClass("border-danger");
                $("#pp2_error").html("<span class='text-danger'>Le mot de passe n'est pas similaire à l'autre</span>");
                status = true;
            }
        }
        else alert("Il ya des errors dans votre entries!");
    })

//Fetch Product Stat
    fetch_Product_Stat();
    function fetch_Product_Stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {statProduit: 1},
            success: function (data) {
                $("#ps").html(data);
            }
        })
    }
    //Fetch Brand Stat
    fetch_Brand_Stat();
    function fetch_Brand_Stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {statBrand: 1},
            success: function (data) {
                $("#ts").html(data);
            }
        })
    }
    //Fetch Category Stat
    fetch_Category_Stat();
    function fetch_Category_Stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {statCategory: 1},
            success: function (data) {
                $("#cs").html(data);
            }
        })
    }
    //Fetch Command Stat
    fetch_Command_Stat();
    function fetch_Command_Stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {statCommand: 1},
            success: function (data) {
                $("#cms").html(data);
            }
        })
    }




})