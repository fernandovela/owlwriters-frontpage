document.addEventListener('DOMContentLoaded', function() {
    // Retrieve content from collection using AJAX
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //content = this.responseText;
            var content = this.responseText;

            // "Type" content to the page
            var typespace = document.getElementById("typespace");
            
            console.log(content.length)
            for (var i = 0; i < content.length; i++) {
                setTimeout( function(ch) {
                    return function() { typespace.innerHTML += ch; }; 
                }(content[i]), i * 125);
            };
        }
    };
    xmlhttp.open("POST", "getContent.php", true);
    xmlhttp.send(null); 
});