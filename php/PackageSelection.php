
<?php 
$pid = $_POST['pid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Phumuza Consulting | ICT Solution | Website Development | R99 Sale</title>

<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="../js/jquery-1.11.3.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<link href="../css/phumuza.css" rel="stylesheet"  type="text/css"/>
<script src="../js/phumuza.js">
</script>

<script>
var package = 0;
</script>
</head>

<body>
<div class="loader"></div>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand" href="../index.html" style="font-size:14px; text-shadow:#999 1px 1px 1px;"><img src="../images/PhumuzaLogo.png" height="45" width="auto" /></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="nav navbar-nav">
               <li><h3 style="font-family:Tahoma, Geneva, sans-serif; font-weight:800; text-shadow:#a40 1px 1px 1px;">Phumuza ICT Solutions | Package Selection</h3></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li><a href="../support.html" title="Client Support" > <i class="fa fa-scissors social-button" style=""></i></a></li>
            	<li><a href="../faq.html" title="Frequently Asked Questions" > <i class="fa fa-question-circle social-button" style=""></i></a></li>
                <li><a href="mailto:vumani@phumuza.co.za" title="Send Email Message" > <i class="fa fa-envelope social-button" style=""></i></a></li>
                <li><a href="http://twitter.com/OfficialPhumuza" title="@OfficiaPhumuza Twitter" target="_blank" > <i class="fa fa-twitter social-button" style=""></i></a></li>
                <li><a href="" title="Phumuza Consulting Facebook" > <i class="fa fa-facebook social-button" ></i></a></li>
                <li><a title="Phumuza Consulting LinkedIn" href="http://www.linkedin.com/company/phumuza-consulting" target="_blank" > <i class="fa fa-linkedin social-button" style=""></i></a></li>
      </ul>
        </div>
    </div>
</nav>


<!--Body content goes here -->

<div class="row"> <div class="col-lg-2">&nbsp;</div> 
<div class="col-lg-8">
<div class="row"><div class="col-md-12">
<br /><br /><br /><br />
<h1 style="text-shadow:#333 1px 1px 1px;">Hello <?php echo $_POST['cName'] ?> You Have Chosen Package No: <?php echo $_POST['pid']; ?> </h1>
<h3 style="text-shadow:#999 1pt 1pt 1pt; color:#000;">
<?php 
$pid = 1;
//$conn =  @mysqli_connect(ini_get("mysqli.defualt_host"), "root", "", "phumuza_Web") or die ("Sorry unable to connect"); 
$usr = "root"; $pwd = "";
$dbh = new PDO("mysql:host=localhost;dbname=phumuza_web", $usr, $pwd);
$sth = $dbh->prepare("SELECT * FROM PACKAGES WHERE PID=". $_POST['pid']);
$sth->execute();
foreach($sth->fetchAll() as $row){
	print_r($row[0]."\t".$row[1]."\t".$row[2]."\t".$row[3]);
}

$name = $_POST['cName'];
$sur = $_POST['cLName'];
$web = $_POST['wName'];
$email = $_POST['cEmail'];
$phone = $_POST['cPhone'];
$typ = $_POST['oType'];
?>
</h3>
<input type="hidden" id="name" value="<?php echo $name;?>" />
<input type="hidden" id="sur" value="<?php echo $sur;?>" />
<input type="hidden" id="web" value="<?php echo $web;?>" />
<input type="hidden" id="phone" value="<?php echo $phone;?>" />
<input type="hidden" id="email" value="<?php echo $email;?>" />
<input type="hidden" id="typ" value="<?php echo $typ;?>" />
<input type="hidden" id="pid" value="<?php echo $pid;?>" />
<hr />
<h4 id="timerH4" style="color:#a30;text-shadow: #000 1px 1px 1px; text-align:center;">To confirm order request wait until timer runs out. Press button  below to cancel order request</h4>
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemax="100" aria-valuemin="0" 
style="width:0%;">
43%
</div>
<script>
$(".progress").hide();
</script>
</div>
<h1 id="timerH1" style="font-size:196px; text-align:center;">

</h1>
<center>
<button id="cancelBTN" class="btn btn-default" style="border:#000 2px solid; background:inherit; background-color:inherit; font-weight:800; width:250px">Cancel Order </button>
</center>
<script>
count = 10;
 mm = setInterval(function (){
	 if(count > 0)
	 {
		 count--; 
		 document.getElementById("timerH1").innerHTML = "<center>" +count + "</center>";
		 }
		else
		{
			$.post("Ask.php", { Name: $('#name').val() + "\t" + $('#sur').val(), Query: "I would like to order web package no:"
			 + $('#pid').val() + "Phone Number: " + $('#phone').val() + " Website Name: " +$('#web').val(), Email: $('#email').val() })
  .done(function() {
    
  })
  .fail(function() {
    
  })
  .always(function() {
   
});
 
			document.getElementById("timerH1").innerHTML = "<i class='fa fa-thumbs-up'></i><p style='font-size:36pt;'>Thank you. A consultant will get back to you.</p>";
			$("#cancelBTN").hide();
			$(".progress").show();
			$("#timerH4").html('A request has been sent. Redirecting to home page');
			clearInterval(mm);
			

		}
		 
	 },1000);
	 val = 0;
				mm2 = setInterval(function(){
					$(".progress-bar").css("width", val + "%");
					$(".progress-bar").html(val+"%");
					
					if(val>100){window.location.href="../index.html";}
					val = val + Math.round(Math.random()*20);
					}, 650);
</script>
</div></div>


</div>

</div>

<!--Body content ends here -->

<!--Footer Content Here -->
<footer class="footer">
<div class="container-fluid">
<div class="row">

<div class="col-lg-3">
<ul id="footer-shortcut">
<li><h2 >Blog &amp; Apps</h2></li>
<li><a href="https://www.youtube.com/channel/UC-ZUgeLiRHYQ8sqXmUEMiHw" target="_blank">Creating a class Library Visual Studio 2010</a></li>
<li><a href="http://docs.oracle.com/javase/8/" target="_blank">Java Docs</a></li>
<li><a href="https://xamarin.com/download-it?_bt=101035044788&_bk=ximarin&_bm=e&gclid=Cj0KEQiAtMSzBRDs7fvDosLZmpoBEiQADzG1vF0JfTkKkdmP0Bz520B-977YhC5zNDxk-7mx_xtiyZoaArMg8P8HAQ" target="_blank" >Ximarin Studio Download</a></li>
<li><a href="http://www.htmlkit.com/download/" target="_blank">HTML Kit</a></li>
</ul>
</div>
<div class="col-lg-3">
<ul id="footer-shortcut">
<li><h2 >Social Media</h2></li>
<li><a href="http://twitter.com/OfficialPhumuza" target="_blank"><i class="fa fa-twitter" style="font-size:16px;"> &nbsp; <span > Twitter </span></i></a></li>
<li><a href="http://www.linkedin.com/company/phumuza-consulting" target="_blank"><i class="fa fa-linkedin" style="font-size:16px;"> &nbsp; <span > LinkedIn</span></i></a></li>
<li><a href=""><i class="fa fa-facebook" style="font-size:16px;"> &nbsp; <span > Facebook </span></i></a></li>
<li><a href="mailto:vumani@phumuza.co.za" ><i class="fa fa-envelope" style="font-size:16px;"> &nbsp;<span > Drop us a mail</span></i></a></li>
</ul>
</div>
<div class="col-lg-3">
<ul id="footer-shortcut">
<li><h2 >Contact Info</h2></li>
<li><a href="#">General Information</li>
<li><a href="#">Sales</a></li>
<li><a href="#">System Related Queries</a></li>
<li><a href="#">Customer Support</a></li>
</ul>
</div>
<div class="col-lg-3">
<ul id="footer-shortcut">
<li><h2 >Vumani Mdabe</h2></li>
<li><a href="#">Web Designer | Founder</li>
<li><a href="#">vumani@phumuza.co.za</a></li>
<li><a href="#">info@phumuza.co.za</a></li>
<li><a href="#">Cell: +27 61 960 11 96</a></li>
</ul>
</div>
</div>
</div>
</footer>


<div class="row footer-content navbar-fixed-bottom">

<div class="col-lg-1"></div>
<div class="col-lg-10">
<div class="row">
<div class="col-lg-1" style="padding:5px;">
<p class="copy" style="text-aligh:center; padding:5px; padding-left:10px; font-family:Georgia, 'Times New Roman', Times, serif; vertical-align:text-top;">Ask <i id="footer-close" class="fa fa-close" style="float:right; color:#fff; margin-right:5px;"></i></p>
</div>
<div class="col-lg-3" style="text-align:center; padding:5px;"><input type="text" class="form-control" style="font-size:14px; width:100%;" placeholder="How can we Help?" name="Query" id="query" required="required" /></div>
<div class="col-lg-3" style="text-align:center; padding:5px;"><input type="text" class="form-control" style="font-size:14px; width:100%;" placeholder="Name" id="name" required="required" /></div>
<div class="col-lg-3" style="text-align:center; padding:5px;"><input type="text" class="form-control" style="font-size:14px; width:100%;" placeholder="Email" id="email"  required="required" /></div>
<div class="col-lg-2" style="padding:5px;">
<button id="askButton" class="btn btn-default" style="background-color:transparent; width:100%;" >Send</button>
</div>
</div>

</div></div>

<!-- Modal -->
  <div class="modal fade" id="orderWindow" role="dialog">
    <div class="modal-dialog">
    
     
     <script src="../js/phumuza.js">
</script> 
<script>
$( "#p1" ).click(function() {
  $.post( "php/Ask.php", { Name: $('#name').val(), Query: $('#query').val(), Email: $('#email').val() })
  .done(function() {
    	if($('#name').val() != ""  || $('#query').val() != "" || $('#email').val() != "" ){
			alert("Message Sent");
			$('#name').val("");$('#query').val("");$('#email').val("");
		}
		else alert("Message Error: Please enter all data");
  })
  .fail(function() {
    alert( "error in sending message" );
  })
  .always(function() {
    
});
});

//Confirm order


</script>
</body>
</html>
