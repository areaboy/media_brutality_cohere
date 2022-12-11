<!DOCTYPE html>
<html lang="en">

<head>
 <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="landing page, website design" />


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>



<style>




.section_padding {
padding: 60px 40px;
}

.imagelogo_li_remove {
list-style-type: none;
margin: 0;
 padding: 0;
}

.imagelogo_data{
 width:120px;
 height:80px;
}



  .navbar {
    letter-spacing: 1px;
    font-size: 14px;
    border-radius: 0;
    margin-bottom: 0;
   background-color:purple;

    z-index: 9999;
    border: 0;
    font-family: comic sans ms;
//color:white;
  }



  
.navbar-toggle {
background-color:orange;
  }

.navgate {
padding:16px;color:white;

}



.navgate:hover{
 color: black;
 background-color: orange;

}


.navbar-header{
height:60px;
}

.navbar-header-collapse-color {
background:white;
}

.dropdown_bgcolor{

background: #800000;
color:white;
}

.dropdown_dashedline{
 border-bottom: 2px dotted white;
}

.navgate101:hover{
background:800000;
color:white;

}






.category_post{
background-color: #800000;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}
.category_post:hover {
background: black;
color:white;
}	




.category_post1{
background-color: purple;
padding: 16px;
color:white;
font-size:14px;
border-radius: 15%;
border: none;
cursor: pointer;
text-align: center;
width:100%;
z-index: -999;
}

.category_post1:hover {
background: black;
color:white;
}	



</style>



 
</head>
<body>















<!--start left column all-->

    <div class="left-column-all left_shifting">

<!-- start column nav-->


<div class="text-center">
<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navgator">
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span>
        <span class="navbar-header-collapse-color icon-bar"></span> 
        <span class="navbar-header-collapse-color icon-bar"></span>                       
      </button>
     
<li class="navbar-brand home_click imagelogo_li_remove" ><img class="img-rounded imagelogo_data" src="logo.png"></li>
    </div>
    <div class="collapse navbar-collapse" id="navgator">



      <ul class="nav navbar-nav navbar-right">

        <li class="navgate about_click">Social Media Brutality Detector</li>
       
       
        
        



      </ul>


    </div>
  </div>



</nav>


    </div><br /><br />

<!-- end column nav-->



	
<br>
<div class="rows">

<h2 style='color:fuchsia'><center>Social Media Brutality Detector </center></h2>
<h4><center><b style='color:#800000'>Easily Detect Toxics and Brutal/Offensive Words in a Social Media Posts Powered by Cohere
 Sentiments & Toxicity Detection AI</b></center></h4><br>


Alot of Social Media Brutality  has been going on numerous Social Media Posts. Internets and various Social Media is no longer safe. Toxic Posts Moderations is also
a problem.<br><br>

 Some people complains about being insulted or assaulted on their posts from other social media users. 
Its time to bring sanity back to social media by creating an application that helps to filter those Toxics, brutal and offensive posts.
 As a result, this application was born.
<br><br>



<h3>What It Does</h3>
This application uses <b>Cohere
 Sentiments & Toxicity Detection AI</b> to filter, flag, moderate  and 
detect any Toxics and offensive contents in any Social Media Post by analyzing each Posts contents statements for Posts
 <b>Toxicity or Non-Toxicity, Positivity(Happy Posts), negativity(Offensive Posts) and Neutrality(mild Posts) respectively.....</b>


<br><br>

<div class="col-sm-1">

</div>

<div class="col-sm-10">



<script>

$(document).ready(function(){
$('#posts_btn').click(function(){
		
var desc = $('.desc').val();
var name = 'Testing_Name';


if(desc==""){
alert('Post Description Cannot be empty.');

}


else{

$('#loader_o').fadeIn(400).html('<br><div style="color:white;background:#3b5998;padding:10px;"><img src="ajax-loader.gif">&nbsp;Please Wait, Post is being verified for Toxic and Offensive contents via Cohere AI</div>');
var datasend = {desc:desc, name:name};	
		$.ajax({
			
			type:'POST',
			url:'posts.php',
			data:datasend,
                        crossDomain: true,
			cache:false,
			success:function(msg){


                        $('#loader_o').hide();
				//$('#result_o').fadeIn('slow').prepend(msg);

$('#result_o').fadeIn('slow').html(msg);

			//$('#documents').val('');
			}
			
		});
		
		}
		
	})
					
});




</script>







<!-- form starts  -->


<div class=''>


<div class="col-sm-12 form-group" style='background:#f1f1f1; padding:16px;color:black'>
<label>Posts Descriptions</label>

<br>

<textarea cols="3" rows="3" name="desc" id="desc" class="form-control desc" placeholder="Enter Posts description"></textarea>

            </div>



<div class="form-group">

                    <br>
<button type="button" id="posts_btn" class="fcss1"  >Analyze Posts</button><br><br>
<div id="loader_o"></div>

<br />
</div>


</div>



<div id="result_o" class="myform_o"></div>


<style>

.fcss{
padding: 10px;
  border: 2px solid #666;
  color: white;
  background-color: #800000;
}

.fcss:hover{
 color: black;
  background-color: orange;
}


.fcss1{
padding: 10px;
  border: 2px solid #666;
  color: white;
  background-color: purple;
}

.fcss1:hover{
 color: black;
  background-color: orange;
}




.c_btn{
padding: 10px;
  border: 2px solid #666;
  color: white;
  background-color: #800000;
border:none;
}


.c_btn:hover{
 color: black;
  background-color: orange;
}
</style>




<br><br><br><br>

</div>



<!-- form ends  -->











</div>

<div class="col-sm-1">

</div>


<div>
   
<br><br><br><br><br>
</body>
</html>



















