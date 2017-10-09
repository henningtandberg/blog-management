
/*
* Retrieves pages using a AJAX function.
* Takes a value, which is the php-param.
* Calls blog_ajax.php?q= + param.
*/
function show_post(value) {
    if(value == 0) {
        document.getElementById("printarea").innerHTML = "";
    } else {
        var page = "adminpanel-blog-edit-ajax.php?q=" + value;
        $("#printarea").load(page);
    }
}


//Ajax function that retrieves blog post
function get_post(value) {
    if(value == "") {
        document.getElementById("printarea").innerHTML = "Please select a post";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("printarea").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","adminpanel-blog-edit-ajax.php?q="+value,true);
        xmlhttp.send();
    }

} //END get_post()
