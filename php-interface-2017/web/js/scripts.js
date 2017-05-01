// $.ajax({
//     method: "POST",
//     url: "some.php",
//     data: { name: "John", location: "Boston" }
//     })
//     .done(function( msg ) {
//         alert( "Data Saved: " + msg );
//     });

function openTab(evt, tab) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = "iconTabs tablinks";
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tab).style.display = "block";

    if (typeof evt === "string") {
        document.getElementById(evt).className = "iconTabsSelected tablinks";
    } else {
        evt.currentTarget.className = "iconTabsSelected tablinks";
    }
}

function disconnect() {
    //logout +
    window.location = '/login'
}


/*****
 **
 **     ADMIN PANEL
 **
 *****/

function selectClient() {
    let client = $("#clientInput").val();

    if (client != "Nouveau Client") {
        $.ajax({
            method: "POST",
            url: "/admin/getClient",
            data: {client: client}
        })
            .done(function (msg) {
                console.log("Data Recieved: " + msg);
                $('#nomClient').val(msg.name);
                $('#phonelClient').val(msg.phone);
                $('#emailClient').val(msg.email);
                $('#addrClient').val(msg.addr);
                $('#alertClient').val(msg.alert);
                $('#imgClient').val(msg.img);
            });
    }
}

function updateListeClient() {
    let liste = document.getElementById("client");
    $.ajax({
        method: "POST",
        url: "/admin/getAllClients"
    })
        .done(function (msg) {
            console.log("Data Recieved: " + msg);
            liste.innerHTML = "";
            if (msg == null) return;
            msg = JSON.parse(msg);
            console.log(msg);

            for (client in msg){
                option = document.createElement("option");
                option.setAttribute("value", msg[client].id + " ." + msg[client].nom);
                liste.appendChild(option);
            }

        });

}


function updateClient() {
    let client = $("#clientInput").val();

    let name = $('#nomClient').val();
    let phone = $('#phonelClient').val();
    let email = $('#emailClient').val();
    let addr = $('#addrClient').val();
    let alert = $('#alertClient').val();
    let password = $('#passwordClient').val();
    let img = $('#imgClient').val();

    if (client == "") {
        //on créé
        $.ajax({
            method: "POST",
            url: "/admin/createClient",
            data: {
                client: client,
                name: name,
                phone: phone,
                email: email,
                addr: addr,
                alert: alert,
                password: password,
                img: img
            }
        })
            .done(function (msg) {
                console.log("Data Saved: " + msg);
            });

    } else {
        //on update
        $.ajax({
            method: "POST",
            url: "/admin/updateClient",
            data: {name: name, phone: phone, email: email, addr: addr, alert: alert, password: password, img: img}
        })
            .done(function (msg) {
                console.log("Data Saved: " + msg);
            });

    }
}