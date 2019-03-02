<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Page Administrator</title>
<style type="text/css">
body { font-size:12px; background:#f0f4f5;
font-family:Tahoma, Geneva, sans-serif;
}
.input { padding: 5px; border: 1px solid #999; font-size:20px; min-width:300px; }
.button { padding: 5px 20px; border: 1px solid #999; font-size:17px; background:#ededed;  }

#smua2{ width:375px; height:220px;margin:120px auto;  padding:120px 20px 10px 40px; background:#f0f4f5;background:url(assets/imgs/login.png);}
#smua1{ background:#CCC; margin:10px auto; padding:5px; height:240px; width:450px; }
#judul{ text-align:center;font-size:18px; padding-bottom:10px; border-bottom:2px solid #666;}
#formreg{width:350px;margin-left:10px;}
#formreg-text{ width:120px; padding:10px 10px 5px 40px; float:left;}
#formreg-input{ width:240px; padding:10px 10px 5px 10px; float:left;}
#formreg-button{ width:350px; text-align:center; float:left; margin-top:10px;	}
#form-msg{ font-size:10px; width:300px; height:20px;}
#form-copy{ font-size:12px; text-align:center; padding:15px 10px 10px 5px; width:300px; margin:0 auto;}
#form-copy a{ text-decoration:none; color:#000;}
#form-copy a:hover{ text-decoration:none; color:#999;}
</style>
</head>

<body>
<?php include"../../config/includes.php";
?>

<?php
//echo gethostname(); // may output e.g,: sandie

// Or, an option that also works before PHP 5.3
//echo php_uname('n'); // may output e.g,: sandie
?>

<div id="smua2">
<form action="adminR" method="post">

 <div id="formreg">
   <div id="formreg-input">
     <input type="text" name="user" class="input"  onmouseover="Tip('Username')" onMouseOut="UnTip()" value="Username" onBlur="if(this.value=='') this.value='Username';" onFocus="if(this.value=='Username') this.value='';"/>
 </div>
 <div id="formreg-input"> 
   <input type="password" name="pass" class="input" onMouseOver="Tip('Password')" onMouseOut="UnTip()" value="Password" onBlur="if(this.value=='') this.value='Password';" onFocus="if(this.value=='Password') this.value='';"/>
   </div><div style="clear:both;"></div>
 <div id="formreg-button"><input type="submit" value="Masuk" name="login" class="button" /></div><div style="clear:both;"></div>
 <div id="form-msg"><? include"../../config/msg.php";?></div>
 <div id="form-copy">&copy;2013 <?php echo $APP_NAME;?> - <?php echo $APP_Ver;?> <br> <?php echo $APP_Back;?></div>
                    </div>
</form>

</div>

</body>
</html>
