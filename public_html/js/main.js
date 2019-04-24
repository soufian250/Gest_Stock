$(document).ready(function () {
    var DOMAIN = "http://localhost/inv_project/public_html";
    $("#register_form").on("submit", function () {
        var status = true;
        var status1 = true;
        var status2 = true;
        var status3 = true;
        var name = $("#username");
        var email = $("#email");
        var pass1 = $("#password1");
        var pass2 = $("#password2");
        var type = $("#usertype");
        //hamza@gmail.com
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
            $("#er_error").html("<span class='text-danger'>Veuillez entrer une adresse email valide</span>");
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
        if (status == true & status1 == true & status2 == true & status3 == true) {
            if (pass1.val() == pass2.val()) {
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
        }
    })

    $("#close").on("click", function () {
        window.location.href = encodeURI(DOMAIN + "/dashboard.php");
    })


    //For Reset Password Part
    /*$("#form_reset").on("submit", function () {
     
     var email = $("#logf_email");
     
     var e_patt = new RegExp(/^[A-Za-z0-9_-]+(\.[A-Za-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);
     var status = false;
     
     if (!e_patt.test(email.val())) {
     email.addClass("border-danger");
     $("#ef_error").html("<span class='text-danger'>Veuillez entrer une adresse email valide</span>");
     status = false;
     } else {
     email.removeClass("border-danger");
     $("#ef_error").html("");
     status = true;
     }
     if (status) {
     $(".overlay").show();
     $.ajax({
     url: DOMAIN + "/includes/process.php",
     method: "POST",
     data: $("#form_reset").serialize(),
     success: function (data) {
     $(".overlay").hide();
     if (data == "SENT") {
     alert("Check Your Email!");
     } else {
     alert(data);
     }
     }
     })
     }
     })*/

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
                    //alert(data);
                    if (data === "NOT_REGISTERD") {
                        $(".overlay").hide();
                        email.addClass("border-danger");
                        $("#e_error").html("<span class='text-danger'>On dirait que tu n'es pas inscrit.</span>");
                    } else if (data === "PASSWORD_NOT_MATCHED") {
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

//Edit profile
    $("#profil_form").on("submit", function () {

        var statusn = false;
        var status = false;
        var name = $("#usernamen");
        var pass1 = $("#passwordf");
        var passn = $("#passwordnew");
        var pass2 = $("#passwords");
        //var e_patt = new RegExp(/^[a-z0-9_-]+(\.[a-z0-9_-]+)*@[a-z0-9_-]+(\.[a-z0-9_-]+)*(\.[a-z]{2,4})$/);

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
        if (status == true && statusn == true) {
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
                            $("#alertmsg").html("Modification effectuer                                 <button id='close' type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>");
                            $("#alertmsg").removeClass("d-none");
                            $('#form_profil').modal('toggle');
                        }
                    }
                })
            } else {
                pass2.addClass("border-danger");
                $("#pp2_error").html("<span class='text-danger'>Le mot de passe n'est pas similaire à l'autre</span>");
                status = true;
            }
        } else
            alert("Il ya des errors dans votre entries!");
    })

    //Modifer Name
    $("body").delegate(".edit_name", "click", function () {

        var statusn = false;
        var name = $("#usernamen");
        if (name.val() == "" || name.val().length < 6) {
            name.addClass("border-danger");
            $("#pu_error").html("<span class='text-danger'>S'il vous plaît entrer le nom et le nom doit être plus de 6 caractères</span>");
            statusn = false;
        } else {
            name.removeClass("border-danger");
            $("#pu_error").html("");
            statusn = true;
        }
        var username = name.val();
        if (statusn == true) {
            alert("Hamza");
            $.ajax({
                url: DOMAIN + "/includes/process.php",
                method: "POST",
                data: {editName: 1, name: username},
                success: function (data) {
                    if (data == 1) {
                        alert("Votre Nom est bien Modifier!");
                        window.location.href = "";
                    } else {
                        alert("Il ya des errors dans votre entries!");
                    }
                }
            })
        }
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
//Fetch Paid Stat
    fetch_Paid_Stat();
    function fetch_Paid_Stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {statPaid: 1},
            success: function (data) {
                var num = (Math.round(data * 100) / 100).toFixed(2);
                $("#paids").html(num + "%");
                $("#stat").attr('aria-valuenow', num);
                $("#stat").css("width", num + "%");
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
    //Fetch Top 3 Products
    fetch_Top3_Stat();
    function fetch_Top3_Stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            data: {statTop: 1},
            success: function (data) {
                $("#top").html(data);
            }
        })
    }

//Box Commandes Click
    $("#box").click(function () {
        window.location = $(this).attr("location");
    })

//Box Products Click
    $("#box2").click(function () {
        window.location = $(this).attr("location");
    })

    fetch_zakat_stat();
    function fetch_zakat_stat() {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {statZakat: 1},
            success: function (data) {
                //alert(data["profit"]);
                if (data["profit"] * 1 >= 17000) {
                    $("#zakat").html("<b class='text-danger'>Remarque: </b>Tu es rencontré les conditions pour Sortir la zakat <br>\n\
                    <div class=form-groupe><p class='text-success'>Le montant de zakat est : <b>" + data["zakat"] + "</b></p></div>");
                } else {
                    $("#zakat").html("<b class='text-danger'>Remarque: </b>Pas encore atteint pour la valeur de nissab!");
                }
            }
        })
    }

    $("body").delegate("#zakat_close", "click", function () {
        $("#zakat_card").addClass("d-none");
    })
    
    $("body").delegate(".zakat_info", "click", function () {
        $.ajax({
            url: DOMAIN + "/includes/process.php",
            method: "POST",
            dataType: "json",
            data: {statZakat: 1},
            success: function (data) {
                $("#nissab").html("17000 DH");
                $("#profit").html(data["profit"]+" DH");
            }
        })
    })


})