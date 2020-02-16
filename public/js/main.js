$(document).ready(function(){
    
    $("#btnRegister").click(registracija); //funkcija registracije korisnika
    
    $("#linkRegister").click(function(){
        $("#registerForm").css("display", "block"); //dogadjaj otvaranja register forme
    });

    $(document).on('click','.remove_img', function() {
        $("#registerForm").css("display", "none");  //dogadjaj zatvaranja register forme
    });

    $("#linkLogin").click(function(){
        $("#loginForm").css("display", "block"); //dogadjaj otvaranja login forme
    });

    $(document).on('click','.remove_img', function() {
        $("#loginForm").css("display", "none"); //dogadjaj zatvaranja login forme
    });
    $(document).on('click', '.kat', filterKategorije); //filter kurseva po kategoriji


    svi_kursevi_home();  //ispis svih kurseva po ucitavanju strane
    

    $("#btnSearch").click(search); //serach funkcija kurseva

    $("#statusFollow").click(dodajKursZaKorisnika); //funkcija insert korisnika i kursa

    $("#statusUnfollow").click(ukloniKursZaKorisnika); //funkcija delete kursa od korisnika

    $("#searchKorisnika").keyup(searchKorisnici); //funckija search korisnika

    $(document).on('click','.delete_korisnika', delete_korisnika); //funckija delete korisnika

    $("#popupInsert").click(function() {
        $("#insertForm").css("display", "block"); //dogadjaj otvaranja insert user forme
    });
    
    $(document).on('click','.close_form', function() {
        $("#insertForm").css("display", "none"); //dogadjaj zatvaranja insert user forme
    });

    $("#btnInsertUser").click(insert_korisnika); //pozivanje funkcije za insert korisnika a.panel
    
    

    $(document).on('click','.close_form_update', function() {
        $("#updateForm").css("display", "none");  //dogadjaj zatvaranja update korisnika forme
    });

    //dogadjaj popunjavanja forme za UPDATE korisnika A.PANEL
    $(document).on('click','.update_korisnika', popuni_formu_update_korisnika); 

    $(document).on('click','.close_form_update', function() {
        $("#updateForm").css("display", "none");   //dogadjaj zatvaranja update user forme
       
    });

    $("#btnUpdateUser").click(update_korisnika) //pozivanje funkcije za update korisnika a.panel

    $(document).on('click', '.linkPaginacija', paginacija);
});
//PAGINACIJA AJAX
function paginacija(e) {
    e.preventDefault();
    let broj = $(this).data('i');
    console.log(broj);
    $.ajax({
        url: "index.php?page=paginacija",
        method: "GET",
        dataType: "json",
        data: {
            broj: broj
        },
        success: function(data) {
            //pozivanje f-je za ispis kurseva
            ispis_kurseva(data);
        },
        error: function(xhr,status,error) {
            console.error(error);
            console.error("GRESKA AJAX PAGINACIJA");
        }
    });
}
//END PAGINACIJA AJAX

//UPDATE KORISNIKA - ADMIN PANEL
function update_korisnika() {
    //dohvatanje podataka
    let first_name = $("#first_name_update").val();
    let last_name = $("#last_name_update").val();
    let email = $("#email_update").val();
    let password = $("#password_update").val();
    let id = $("#hidden_update").val();
    let idUloga = $("#uloga_update").val();

    //regularni izrazi
    var re_name=/^[A-Z][a-z]{2,13}(\s[A-Z][a-z]{2,13})*$/;
    var re_email=/^[a-z\.\-\_0-9]+@([a-z]+\.){1,}[a-z]{2,}$/;
    var re_pass=/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/;
    
    let greske = [];

    if(first_name == "")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else if(!re_name.test(first_name)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else {
        toastr.success("First Name has entered.");
    }
    if(last_name == "")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else if(!re_name.test(first_name)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else {
        toastr.success("Last Name has entered.");
    }

    if(password == "")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else if(!re_pass.test(password)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else {
        toastr.success("Password has entered.");
    }

    if(email == "")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else if(!re_email.test(email)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else {
        toastr.success("Email has entered.");
    }
    
    if(greske.length > 0) {
        toastr.error("Please input require fields.")
    }
    else {
        //ajax
        $.ajax({
            url: "index.php?page=update_korisnika",
            dataType: "json",
            method: "POST",
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                password: password,
                id: id,
                idUloga: idUloga,
                poslato: true
            },
            success: function(data) {
                //ispis korisnika
                svi_korisnici();
                console.log("USPEH UPDATE KORISNIKA");
                $("#updateForm").css("display", "none");
            },
            error: function (error){
                console.error("Greska, UPDATE KORISNIKA A.PANEL");
                console.error(error);
            }
        });
    }
}
//END UPDATE KORISNIKA - ADMIN PANEL

//POPUNI FORMU ZA UPDATE KORISNIKA - ADMIN PANEL
function popuni_formu_update_korisnika() {
    //dohvatanje podataka
    let id = $(this).data('id');
    //ajax
    $.ajax({
        url: "index.php?page=dohvati_korisnika",
        dataType: "json",
        method: "POST",
        data: {
            id: id
        },
        success: function(korisnik) {
            //dogadjaj otvaranja update korisnika forme
            $("#updateForm").css("display", "block");

            //popunjavanje forme podacima
            $("#first_name_update").val(korisnik.ime);
            $("#last_name_update").val(korisnik.prezime);
            $("#email_update").val(korisnik.email);
            $("#password_update").val(korisnik.password);
            $("#hidden_update").val(korisnik.idKorisnik);
            $('#uloga_update').val(korisnik.idUloga);
        },
        error: function (error){
            console.error("Greska, INSERT KORISNIKA A.PANEL");
            console.error(error);
        } 
    })
    //popunjavanje forme
}
//END FORMU ZA UPDATE KORISNIKA - ADMIN PANEL

//INSERT KORISNIKA - ADMIN PANEL
function insert_korisnika() {
    //dohvatanje podataka
    let first_name = $("#first_name_insert").val();
    let last_name = $("#last_name_insert").val();
    let email = $("#email_insert").val();
    let password = $("#password_insert").val();
    
    //regex
    var re_name=/^[A-Z][a-z]{2,13}(\s[A-Z][a-z]{2,13})*$/;
    var re_email=/^[a-z\.\-\_0-9]+@([a-z]+\.){1,}[a-z]{2,}$/;
    var re_pass=/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/;
    
    let greske = [];

    if(first_name == "")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else if(!re_name.test(first_name)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else {
        toastr.success("First Name has entered.");
    }
    if(last_name == "")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else if(!re_name.test(first_name)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else {
        toastr.success("Last Name has entered.");
    }

    if(password == "")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else if(!re_pass.test(password)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else {
        toastr.success("Password has entered.");
    }

    if(email == "")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else if(!re_email.test(email)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
        greske.push("Error");
    }
    else {
        toastr.success("Email has entered.");
    }


    if(greske.length > 0) {
        toastr.error("Please input require fields.")
    }
    else {
        //ajax
        $.ajax({
            url: "index.php?page=insert_korisnika",
            dataType: "json",
            method: "POST",
            data: {
                first_name: first_name,
                last_name: last_name,
                email: email,
                password: password,
                poslato: true
            },
            success: function(data) {
                //ispis korisnika
                svi_korisnici();
                console.log("USPEH INSERT KORISNIKA");
                $("#insertForm").css("display", "none");
            },
            error: function (error){
                console.error("Greska, INSERT KORISNIKA A.PANEL");
                console.error(error);
            }
        });
    }
}
//END INSERT KORISNIKA - ADMIN PANEL

// DELETE KORISNIKA - ADMIN PANEL
function delete_korisnika() {
    //dohvatanje podataka
    let id = $(this).data('id');
    $.ajax({
        url: "index.php?page=delete_korisnika",
        method: "POST",
        dataType: "json",
        data: {
            id: id
        },
        success: function(data) {
            //ispis korisnika a. panel
            svi_korisnici();
        },
        error: function (error){
            console.error("Greska, DELETE KORISNIKA A.PANEL");
            console.error(error);
        }
    });
}
//END DELETE KORISNIKA - ADMIN PANEL

//SEARCH KORISNIKA - ADMIN PANEL
function searchKorisnici() {
    //dohvatanje podataka
    let search = $(this).val();
    console.log($("#searchKorisnika").val());
    console.log(search);
    $.ajax({
        url: "index.php?page=search_korisnici",
        method: "POST",
        dataType: "json",
        data: {
            search: search
        },
        success: function(data) {
            //pozivanje f-je za ispis korisnika a.panel
            ispis_korisnika(data);
        },
        error: function (error){
            console.error("Greska, Filtriranje po searchu KORISNICI A.PANEL");
            console.error(error);
        }
    });
}
//END SEARCH KORISNIKA - ADMIN PANEL

// PRIKAZ KORISNIKA - ADMIN PANEL
function svi_korisnici() {
    //ajax
        $.ajax({
            url: "index.php?page=korisnici_svi",
            method: "POST",
            dataType: "json",
            success: function(data) {
                console.log("USPEH ISPIS KORISNIKA");
                ispis_korisnika(data);
            },
            error: function (error){
                console.error("Greska, AJAX , ISPIS SVIH KORISNIKA A.PANEL");
                console.error(error);
            }
        });
}

//END PRIKAZ KORISNIKA - ADMIN PANEL

//funkcija za prikaz korisnika u html
function ispis_korisnika(korisnici) {
    let html = "";
    for(let kor of korisnici) {
        html+=`
        <tr class="nicdark_border_bottom_1_solid_grey">
        <td class="nicdark_padding_10 nicdark_color_greydark">  
            ${kor.idKorisnik}
        </td>
        <td class="nicdark_padding_10 nicdark_color_greydark">  
            ${kor.ime} 
        </td>
        <td class="nicdark_padding_10 nicdark_color_greydark">  
            ${kor.prezime} 
        </td>
        <td class="nicdark_padding_10 nicdark_color_greydark">  
            ${kor.email}
        </td> 
        <td class="nicdark_padding_10 nicdark_color_greydark">  
            ${kor.password}
        </td> 
        <td class="nicdark_padding_10 nicdark_color_greydark">
            ${kor.registrovan_vreme} 
        </td>
        <td class="nicdark_padding_10 nicdark_text_align_center 
        nicdark_text_transform_uppercase nicdark_color_greydark">  
            ${kor.uloga}
        </td> 
        <td class="nicdark_padding_10 nicdark_text_align_center">   
            <a class="nicdark_display_inline_block
            nicdark_color_white nicdark_bg_yellow
            nicdark_first_font nicdark_padding_8
            nicdark_border_radius_3
            nicdark_font_size_13 update_korisnika" data-id="${kor.idKorisnik}" href="#">UPDATE</a>
        </td>
        <td class="nicdark_padding_10 nicdark_text_align_center">  
            <a class="delete_korisnika nicdark_text_align_center" data-id="${kor.idKorisnik}"><img alt="close_img" width="15"
                src="public/img/icons/icon-remove-red.svg">
            </a>
        </td>
    </tr>  
        `
    }
    $("#svi_korisnici").html(html);
}
// END funkcija za prikaz korisnika u html



//UPDATE KORISNIK-KURS --AJAX
function ukloniKursZaKorisnika(e) {
    e.preventDefault();
    //dohvatanje podataka
    let id = $(this).data('id');
    //ajax
    $.ajax({
        url: "index.php?page=korisnik_kursevi_update",
        method: "GET",
        dataType: "json",
        data: {
            id: id
        },
        success: function() {
            window.location.replace("index.php?page=usersPage");
            console.log("USPEH UPDATE"); //nema vracanja koda
        },
        error: function (status, error){
            console.error("Greska, UPDATE korisnik,kurs");
            console.error(error);
            console.error(status);
        }
    });
}
//END UPDATE KORISNIK-KURS --AJAX

//INSERT KORISNIK-KURS -- AJAX
function dodajKursZaKorisnika(e) {
    e.preventDefault();
    let id = $(this).data('id');
    
    $.ajax({
        url: "index.php?page=korisnik_kursevi_insert",
        method: "GET",
        dataType: "json",
        data: {
            id: id
        },
        success: function() {
            // ispis_kurseva(data);
            window.location.replace("index.php?page=usersPage");
            console.log("USPEH INSERT"); //nema vracanja koda
        },
        error: function (status, error){
            console.error("Greska, INSERT korisnik,kurs");
            console.error(error);
            console.error(status);
        }
    });
}
//END INSERT KORISNIK-KURS --AJAX

//SEARCH KURSEVA
function search() {
    //ajax
    let naziv = $("#searchFiled").val();
    $.ajax({
        url: "index.php?page=search_kurs",
        method: "POST",
        dataType: "json",
        data: {
            naziv: naziv
        },
        success: function(data) {
            ispis_kurseva(data);
        },
        error: function (error){
            console.error("Greska, Filtriranje po searchu");
            console.error(error);
        }
    });
}
//END SEARCH KURSEVA

//FILTER PROIZVODA PO KATEGORIJI
function filterKategorije(e) {
    // $(this).toggleClass("active");
    e.preventDefault();
    let id = $(this).data('id');
    $.ajax({
        url: "index.php?page=kategorije",
        method: "POST",
        dataType: "json",
        data: {
            id: id
        },
        success: function(data) {
            ispis_kurseva(data);
        },
        error: function (error){
            console.error("Greska, AJAX , Filtriranje po kategoriji");
            console.error(error);
        }

    });
}
// END FILTER PROIZVODA PO KATEGORIJI
//ISPIS KURSEVA HOME STRANA
function svi_kursevi_home() {
    $.ajax({
        url: "index.php?page=kursevi_svi",
        method: "POST",
        dataType: "json",
        success: function(data) {
            console.log("USPEH ISPIS");
            ispis_kurseva(data);
            console.log(data);
        },
        error: function (error){
            console.error("Greska, AJAX , ISPIS SVIH KURSEVA");
            console.error(error);
        }
    });
}
function ispis_kurseva(kursevi) {
    //ovde for petlja da ispisem sve
    let html="";
        for(let k of kursevi) {
            html+=`
    <div class="nicdark_width_33_percentage nicdark_width_100_percentage_responsive nicdark_float_left">

    <div class="nicdark_section nicdark_padding_15 nicdark_box_sizing_border_box">

        <!--start preview-->
        <div class="nicdark_section nicdark_border_1_solid_grey">

            <!--image-->
            <div class="nicdark_section nicdark_position_relative">

                <img width="100%" height="202.33" alt="${k.naziv}" class="nicdark_section" src="public/img/courses_img/${k.slika}">

                <div
                    class="nicdark_bg_greydark_alpha_gradient_2 nicdark_position_absolute nicdark_left_0 nicdark_height_100_percentage nicdark_width_100_percentage nicdark_padding_20 nicdark_box_sizing_border_box">

                    

                    <div class="nicdark_position_absolute nicdark_bottom_20">
                        <div class="nicdark_display_table nicdark_float_left">
                            <img alt=""
                                class="nicdark_margin_right_10 nicdark_display_table_cell nicdark_vertical_align_middle"
                                width="20" src="public/img/icons/icon-calendar.svg">
                            <p
                                class=" nicdark_color_white nicdark_display_table_cell nicdark_vertical_align_middle nicdark_font_size_13">
                                ${k.datum}</p>
                            <img alt=""
                                class="nicdark_margin_right_10 nicdark_margin_left_20 nicdark_display_table_cell nicdark_vertical_align_middle"
                                width="20" src="public/img/icons/icon-clock.svg">
                            <p
                                class="nicdark_color_white nicdark_display_table_cell nicdark_vertical_align_middle nicdark_font_size_13">
                                ${k.vreme_trajanja}</p>
                        </div>
                    </div>
                </div>

            </div>
            <!--image-->


            <div class="nicdark_section nicdark_padding_20 nicdark_box_sizing_border_box">

                <h3><a class="nicdark_color_greydark nicdark_first_font course_font"
                        href="single-course.html">${k.naziv}</a></h3>
                <div class="nicdark_section nicdark_height_20"></div>
                <p class="course_desciption_short" ><a href="single-course.html">${k.opis}</a></p>

            </div>

            <div
                class="nicdark_section nicdark_padding_20 nicdark_box_sizing_border_box nicdark_bg_grey nicdark_border_top_1_solid_grey">

                <div
                    class="nicdark_width_45_percentage nicdark_width_50_percentage_all_iphone nicdark_display_none_all_iphone nicdark_float_left">
                    <div class="nicdark_display_table nicdark_float_left">
                        <img alt=""
                            class="nicdark_margin_right_10 nicdark_display_table_cell nicdark_vertical_align_middle nicdark_border_radius_100_percentage"
                            width="25" src="public/img/avatar/${k.t_slika}">
                        <p
                            class="nicdark_display_table_cell nicdark_vertical_align_middle nicdark_font_size_15">
                            <a href="single-teacher.html">${k.ime_prezime}</a></p>
                    </div>
                </div>

                <div
                    class="nicdark_width_55_percentage nicdark_width_50_percentage_all_iphone nicdark_float_left nicdark_text_align_right">
                    <a class="nicdark_display_inline_block nicdark_color_white nicdark_bg_green nicdark_first_font nicdark_padding_8 nicdark_border_radius_3 nicdark_font_size_13"
                        href="index.php?page=single_kurs&id=${k.idKurs}">PREVIEW</a>
                </div>

            </div>



        </div>
        <!--start preview-->

    </div>

    </div>
    `;
    }
    
    $("#svi_kursevi").html(html);
}
//END ISPIS KURSEVA

//KLIJENTSKA PROVERA REGISTRACIJA
function registracija() {
    var first_name=$("#first_name").val();
    var refirst_name=/^[A-Z][a-z]{2,13}(\s[A-Z][a-z]{2,13})*$/;
    var last_name=$("#last_name").val();
    var relast_name=/^[A-Z][a-z]{2,13}(\s[A-Z][a-z]{2,13})*$/;
    var email=$("#email").val();
    var reEmail=/^[a-z\.\-\_0-9]+@([a-z]+\.){1,}[a-z]{2,}$/;
    var password=$("#password").val();
    var rePassword=/(?=.*[a-z])(?=.*[0-9])(?=.{8,})/;

    //check FIRST_NAME
    if(first_name=="")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
        
    }
    else if(!refirst_name.test(first_name)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
    }
    else {
        toastr.success("First Name has entered.");
    }
    //check LAST_NAME
    if(last_name=="")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
        
    }
    else if(!relast_name.test(last_name)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
    }
    else {
        toastr.success("Last Name has entered.");
    }
    //check EMAIL
    if(email=="")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
    }
    else if(!reEmail.test(email)) 
    {
        toastr.error("An entry has invalid value. Please correct and try again.");
    }
    else {
        toastr.success("Email has entered.");
    }
    //check PASSWORD
    if(password=="")
    {
        toastr.error("An entry is required or has invalid value. Please correct and try again.");
    }
    else if(!rePassword.test(password)) 
    {
        toastr.error("Password must be at least 8 characters in length.");
    }
    else {
        toastr.success("Password has entered.");
    }

    function getData() {
        var obj = {
            first_name:$("#first_name").val(),
            last_name:$("#last_name").val(),
            email:$("#email").val(),
            password:$("#password").val(),
            btnRegister:true
        };
    return obj;
    }
    function callAjax(obj){
        $.ajax({
            url:"index.php?page=register",
            type:"POST",
            dataType:"json",
            data: obj,
            success:function(data,xhr){
                toastr.success("Please check your email.");
                //console.log(data);
            },
            error:function(xhr,status,error){
                var poruka="Doslo je do greske";
                switch(xhr.status){
                    case 404:
                    poruka="Stranica nije pronadjena";
                    break;
                    case 409:
                    poruka="Username ili email vec postoji";
                    break;
                    case 422:
                    poruka="Podaci nisu validni";
                    console.log(xhr.responsiveText);
                    break;
                    case 500:
                    poruka="Greska";
                    toastr.success(poruka);
                    break;
                }
                toastr.error(poruka);
            }
        });
    }
var data=getData();
callAjax(data);
}
//ZAVRSENA REGISTRACIJA NA KLIJENTSKOJ STRANI