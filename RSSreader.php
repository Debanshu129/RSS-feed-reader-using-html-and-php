<html>
<head>
<script>
function showfeed(str) {
  if (str.length==0) { 
    document.getElementById("rssOutput").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    xmlhttp=new XMLHttpRequest();
  } else {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("rssOutput").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getrss.php?q="+str,true);
  xmlhttp.send();
}
</script>
<script type="text/javascript">
            function display_c (start) {
                window.start = parseFloat(start);
                var end = 1000000000000000000000000
                var refresh = 1000;
                if( end >= window.start ) {
                    mytime = setTimeout( 'display_ct()',refresh )
                }
            }
            function display_ct () {
                var minutes = Math.floor(window.start/60);
                var secs = Math.floor((window.start - (minutes*60)));
 
                var x = " " + minutes + " Minutes and " + secs + " Seconds ";
 
                document.getElementById('ct').innerHTML = x;
                window.start = window.start + 1;
 
                tt = display_c(window.start);
            }
</script>
<script type="text/javascript">
var d = new Date();
document.write(d);
</script>

<style type="text/css">
 .topright{
   position:absolute;
   top:0;
   right:0;
  }
  .center {
   margin: auto;
   text-align: center;
}
</style>

</head>
<body onLoad="display_c(0);">

<span class="topright" id="ct"></span>
</ul>
<br>
<div class="center">
<form>
<select onchange="showfeed(this.value)">
<option value="">Select an RSS-feed:</option>
<option value="Reddit">Reddit feed</option>
</select>
</form>
</div>
<br>
<div id="rssOutput">RSS-feed will be listed here...</div>

</body>
</html>