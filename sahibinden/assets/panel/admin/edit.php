<?php
$page = "edit";
include "form.php";
?>


<?php
	if ($_POST) {
		$username = trim(strip_tags($_POST['username']));
		$password = trim(strip_tags($_POST['password']));
		
		if (!$username ) {
			exit;
		}else {
			if ($password) {
				$password = md5($password);
			}else {
				$password = $fetch['password'];
			}
			if ($add) {
				header("location:index.php?page=".$page_name."&action=list");
			}
		}
		
	}
?>
</div>
</body>
</html>
