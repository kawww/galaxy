<?php

error_reporting(0);
include("rpc.php");

$kpc = new Keva();

$kpc->username=$krpcuser;
$kpc->password=$krpcpass;
$kpc->host=$krpchost;
$kpc->port=$krpcport;

$rpc = new Raven();

$rpc->username=$rrpcuser;
$rpc->password=$rrpcpass;
$rpc->host=$rrpchost;
$rpc->port=$rrpcport;

$_REQ = array_merge($_GET, $_POST);//iotstat



?>
<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8"><title>GALAXY</title>
	<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

html,body, input, textarea {
background: black; color: #0F0; font-family: "Courier New", Courier, monospace; font-size: 18px; text-wrap: normal;margin: 0 auto -100px;padding: 0;
}


a { text-decoration: none; color: #FFDD55 }
a:hover { text-decoration: underline }


#thread {
 border:0px solid black;
 width:300px;
 margin-bottom:10px;

}





div.post {
 border-bottom:px solid black;
 padding:0px;
}


div.post_title {
 border-bottom:0px dotted #0066CC;
 font-weight:bold;
}


div.post_content {
 font-size:16px;
 margin-top:5px;
}





input, textarea {
 background: black; border: 0; color: #0F0; font-family: "Courier New", Courier, monospace; font-size: 16px; margin-top: -1px; outline: none;
}


textarea {
 width:400px;
 height:50px;
}

.fade-in-words{
  


}

@keyframes fade-in{  
    0%{ opacity: 0;}
    100%{opacity:1;}
}
@-webkit-keyframes fade-in{
    0%{ opacity: 0;}
    100%{opacity:1;}
}
@-ms-keyframes fade-in{
    0%{ opacity: 0;}
    100%{opacity:1;}
}
@-o-keyframes fade-in{
    0%{ opacity: 0;}
    100%{opacity:1;}
}
@-moz-keyframes fade-in{
    0%{ opacity: 0;}
    100%{opacity:1;}
}
.first-words{ 
    opacity: 0;     
    animation: fade-in 1s ease 0s 1;   
    -webkit-animation: fade-in 1s ease 0s 1;
    -moz-animation: fade-in 1s ease 0s 1;
    -o-animation: fade-in 1s ease 0s 1;
    -ms-animation: fade-in 1s ease 0s 1;
    
 
    animation-fill-mode:forwards;
    -webkit-animation-fill-mode: forwards;  
      -o-animation-fill-mode: forwards; 
      -ms-animation-fill-mode: forwards;   
      -moz-animation-fill-mode: forwards; 
}
.second-words{ 
    opacity: 0;    
    animation: fade-in 1s ease 0.5s 1;
    -webkit-animation: fade-in 1s ease 0.5s 1;
    -moz-animation: fade-in 1s ease 0.5s 1;
    -o-animation: fade-in 1s ease 0.5s 1;
    -ms-animation: fade-in 1s ease 0.5s 1;

    animation-fill-mode:forwards;
    -webkit-animation-fill-mode: forwards;  
      -o-animation-fill-mode: forwards; 
      -ms-animation-fill-mode: forwards;   
      -moz-animation-fill-mode: forwards; 
}
.third-words{ 
    opacity: 0;    
    animation: fade-in 1s ease 1s 1;
    -webkit-animation: fade-in 1s ease 1s 1;
    -moz-animation: fade-in 1s ease 1s 1;
    -o-animation: fade-in 1s ease 1s 1;
    -ms-animation: fade-in 1s ease 1s 1;
    

    animation-fill-mode:forwards;
    -webkit-animation-fill-mode: forwards;  
      -o-animation-fill-mode: forwards; 
      -ms-animation-fill-mode: forwards;   
      -moz-animation-fill-mode: forwards; 
}

</style>

<?php 

$coin=$_REQ["coin"];

if(!$coin){$coin="RAVENCOIN";}


?>


<script>
	
var xmlHttp;      
var username;    
var coin;   
var threadid;    


function createXmlHttp() {

 if (window.XMLHttpRequest) {
  xmlHttp = new XMLHttpRequest();     
 } else {
  xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
 }
}


function submitPost() {

 username = document.getElementById("username").value;
 threadid = document.getElementById("threadid").value;
 coin = document.getElementById("coin").value;
 if (checkForm()) {
  createXmlHttp();
  xmlHttp.onreadystatechange = submitPostCallBack; 
  xmlHttp.open("POST", "/shelljson.php", true);   

  xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlHttp.send("username=" + encodeURI(username) + "&threadid=" + threadid+ "&coin=" + coin);   
 }
}

function checkForm() {

 return true;
}


function submitPostCallBack() {
 if (xmlHttp.readyState == 4) {

  createNewPost(xmlHttp.responseText);
 }
}


function createNewPost(postId) {


 document.getElementById("username").value = "";

 var postDiv = createDiv("post", ""); 
 postDiv.id = "post" + postId;   

 var postTitleDiv = createDiv("post_title", "<?php echo $coin; ?>:> " + username + ""); 
 var postContentDiv = createDiv("post_content", "" + xmlHttp.responseText + ""); 
 postDiv.appendChild(postTitleDiv);      
 postDiv.appendChild(postContentDiv);      

document.getElementById("thread").appendChild(postDiv);




}


function createDiv(className, text) {
 var newDiv = document.createElement("div");
 newDiv.className = className;
 newDiv.innerHTML = text;
 return newDiv;
} 
</script>
<script type="text/javascript">
window.onload=function(){
document.getElementById('username').focus();
}
</script>
</head>

<body>





<div class="fade-in-words">
            <div class="first-words">Connecting to Galaxy...</div>
            <div class="second-words">Connection established.</div>
   
       
		<div class="third-words"><br><br>



Welcome to Universal Blockchain Operating System <br><br>

 * Documentation:  ravencoin.org<br>
 * Documentation:  kevacoin.org<br>
 * Documentation:  ipfs.io<br><br>

 * Ravencoin Shell:  rvn.galaxyos.io<br>
 * Kevacoin &nbsp;Shell:  keva.galaxyos.io<br>
 <br>

  System information as of <?php echo date("Y-m-d h:i:s"); ?> <br><br>

  Ravencoin Blocks:  <?php  $rnum= $rpc->getblockcount();echo $rnum; ?> <br>           
  Kevacoin&nbsp;&nbsp;Blocks:  <?php  $knum= $kpc->getblockcount();echo $knum; ?> <br><br>  
  
<div id="thread">

</div>


<div>


<input type="hidden" name="threadid" id="threadid" value="1">
<input type="hidden" name="coin" id="coin" value="<?php echo $coin; ?>">

<?php echo $coin; ?>:> <input type="text" name="username" id="username" onkeydown='if(event.keyCode==13){submitPost();}' style= "width:200px;background-color:transparent;outline:medium;border:0;border-bottom:1px solid #0F0;margin-bottom:20px;">
</div>
</div></div>



</body>
</html> 