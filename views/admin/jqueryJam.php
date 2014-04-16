<html>
<head>
<script>
  $(document).ready(function() {
    setInterval(function() {
         $('#divjam').load('jam.php?acak='+ Math.random());
    }, 1000);
  });
</script>
</head>
<body>
<div style="width:200px; text-shadow: 0 1px 0 #fff; color:#444; margin:3px 0 -10px 0px; padding:10px 10px 0px 0px; height:10px; font-size:13px;" align="center">
<div id="divjam"></div>
</div>
</body>
</html>