<?php
  header('Content-type: text/html');
  header('Access-Control-Allow-Origin: *');
  $uri = 'http'. ($_SERVER['HTTPS'] ? 's' : null) .'://'. $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  echo('<p>This information has come from <a href="' . $uri . '">' . $uri . '</a></p>');

?>


<script>
  var isIE8 = window.XDomainRequest ? true : false;
  var invocation = createCrossDomainRequest();
  var url = 'http://bietjhs.ac.in/studentresultdisplay/frmprintreport.aspx';
  function createCrossDomainRequest(url, handler) {
    var request;
    if (isIE8) {
      request = new window.XDomainRequest();
      }
      else {
        request = new XMLHttpRequest();
      }
    return request;
  }

  function callOtherDomain() {
    if (invocation) {
      if(isIE8) {
        invocation.onload = outputResult;
        invocation.open("GET", url, true);
        invocation.send();
      }
      else {
        invocation.open('GET', url, true);
        invocation.onreadystatechange = handler;
        invocation.send();
      }
    }
    else {
      var text = "No Invocation TookPlace At All";
      var textNode = document.createTextNode(text);
      var textDiv = document.getElementById("textDiv");
      textDiv.appendChild(textNode);
    }
  }

  function handler(evtXHR) {
    if (invocation.readyState == 4)
    {
      if (invocation.status == 200) {
          outputResult();
      }
      else {
        alert("Invocation Errors Occured");
      }
    }
  }

  function outputResult() {
    var response = invocation.responseText;
    var textDiv = document.getElementById("textDiv");
    textDiv.innerHTML += response;
  }
</script>
<form id="controlsToInvoke" action="">
    <p>
        <input type="button" value="Click to Invoke Another Site" onclick="callOtherDomain()" />
    </p>
</form>
<div id="textDiv">
    The information below (when it appears) has been fetched using cross-site XHR.
</div>