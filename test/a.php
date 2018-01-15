<?php 
header("Access-Control-Allow-Headers : Content-Type");
header("Access-Control-Allow-Methods : POST, OPTIONS");
 
echo <<<HTML
<html>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.js"></script>

<script type="text/javascript">

function getXmlHttp() {
    var xmlhttp
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e1) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}

function example2() {
    var req = getXmlHttp()
    req.open('POST', 'http://www.bietjhs.ac.in/studentresultdisplay/frmprintreport.aspx', false)
    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            if (req.status == 200) {
                var data_json = JSON.parse(req.responseText);
                alert(data_json.content);
            }
        }
    }
    
     
     req.send();
}

$(document).on('click', '.btn', function () {
    example2();
});

</script>
</head>
<body>
  <div class="btn">qweqwe</div>
</body>
</html> 
HTML;
 
?> 
