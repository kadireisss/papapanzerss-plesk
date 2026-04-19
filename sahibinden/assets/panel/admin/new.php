<?php
$page = "new";
include "form.php";
?>


<?php
	if ($_POST) {
		$username = trim(strip_tags($_POST['username']));
		$password = md5(trim(strip_tags($_POST['password'])));
		
		if (!$username || !$password) {
			echo "Boş alanları doldurun.";
		}else {
			$query = $conn->prepare("INSERT INTO login SET username = ?, password = ?");
			$insert = $query->execute(array($username, $password));
			if ($insert){
				echo json_encode(['status'=>'done']);
			}else{
				echo json_encode(['status'=>'error']);
			}
		}
		
	}
?>
</div>
</body>
</html>
