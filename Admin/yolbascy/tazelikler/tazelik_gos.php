<?php ob_start();?>
<link rel="stylesheet" type="text/css" href="tazelikler/style/style.css">
<div class="MAINcontainer">
	  <div class="container">
	   <div>
	    <div class="bildirisTITLE">TÄZELIK GOŞMAK</div>
	    <center>
        <form action="index.php?page=tazelik_gos" method="post" enctype="multipart/form-data" autocomplete="off">
				<input class="input" type="text" name="newsName" placeholder="TÄZELIGIŇ ADY" required>

				<label class="input" for="ok" required>SURAT SAÝLAŇ</label>
				<input type="file" id="ok" name="img" style="display: none;">


				<textarea name="newsText" placeholder="BILDIRIŞ HAKYNDA MAGLUMAT" required></textarea>


				<input class="input" type="hidden" name="gosan_id" value="<?php echo $user_id; ?>">
				<input class="input" type="hidden" name="fakultet" value="<?php echo $fakulteti; ?>">

				<input class="input" type="submit" name="yolla" value="ÝATDA SAKLAT!">
        </form>
        <div>  </div>
        </center>
        </div>

      </div>
</div>

<?php

if(isset($_POST['yolla'])){
	$newsName = $_POST['newsName'];
	$newsText = $_POST['newsText'];
	$gosanyn_fakulteti = $_POST['fakultet'];
	$gosan_id = $_POST['gosan_id'];


	$place_img = $_FILES['img']['tmp_name'];
	if(empty($place_img)){echo"<script>alert('SURAT SAÝLAMADYŇYZ!')</script>";die();}
    $newfilename =date('dmYHis').str_replace(" ", "", basename($_FILES["img"]["name"]));
	move_uploaded_file($place_img,"../img/news/" . $newfilename);

	$connect = mysqli_connect('localhost','root','','oguzhan');
	$quer = "INSERT INTO news(news_name,news_img,news_text,news_added_date,degisli_fakulteti,mugallym_id) VALUES ('$newsName','$newfilename','$newsText',curdate(),'$gosanyn_fakulteti',$gosan_id)";
	$result = mysqli_query($connect,$quer);
	header("Location:index.php?page=tazelik_gos");

}
ob_end_flush();
?>