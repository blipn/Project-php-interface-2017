
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

    if(typeof evt === "string"){
        document.getElementById(evt).className = "iconTabsSelected tablinks";
    }else {
        evt.currentTarget.className = "iconTabsSelected tablinks";
    }
}

function disconnect() {
    //logout +
    window.location = '/login'
}