<!--<meta http-equiv="Refresh" content="5" />-->
<?php
require"../../config/includes.php";
$upd=new Update();
$update=$upd->getUptodate();
if($update->getRecordCount() == 1)
{
	$post['update_field']='0';
	$upd->editUpdate0($post);
?>
<script language="javascript">
parent.location.reload();
</script>
<?
}
?>
