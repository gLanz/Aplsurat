<?php ob_start();
session_start();
ob_clean();
//file includes untuk variabel setiap yang ada di 
//page dan berfungsi sebagai file pembawa variabel
include("../../config/config.php");
include("../../config/mysql.php");

include("../../libs/core/_class.database.php");
include("../../libs/core/func.title.php");
include("../../libs/core/inc.func.php");
include("../../libs/core/func.enkrip.php");
include("../../libs/core/func.url.php");
include("../../libs/capctha/securimage.php");
include("../../libs/core/class_paging.php");

include("../../libs/core/_class.log.php");
include("../../libs/core/_class_user.php");	
include("../../libs/core/_class.update.php");	
include("../../libs/core/_class.surat.php");
//include("../../libs/core/_class.slider.php");
include("../../libs/core/_class.parameter.php");
include("../../libs/core/_get_exc.class.php");
//print "Selamat datang di website ini";
?>