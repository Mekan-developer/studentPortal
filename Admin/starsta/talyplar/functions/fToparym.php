<?php
function TparymSearch($var,$faculty){
			$ady = $_POST['search'];	
			$connect = mysqli_connect('localhost','root','','oguzhan');		
            $query = "SELECT * FROM agzalar where topary = '$var' and fakulteti = '$faculty' and name LIKE '$ady%'";
            $result = mysqli_query($connect,$query);
            $id_count=0;$TassyklananDerejesi='';
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id']; $id_count++;  
            $name = $row['name'];
            $surname = $row['surname'];
            $ady = $name." ".$surname;
            $hunari = $row['hunari'];
            $kursy = $row['kursy'];
            $suraty = $row['suraty'];
            $topar = $row['topary'];
            $tassyknama = $row['berlen_derejesi'];
        if($tassyknama == 0){$TassyklananDerejesi='Talyp';}else if($tassyknama==4){$TassyklananDerejesi='Starsta';}else{$TassyklananDerejesi='Gurnakcy';}
        ?>

        <tr>
            <td><?php echo $id_count ;  ?></td>
            <td><?php echo $name ; ?></td>
            <td><?php echo $surname; ?></td>
            <td><?php echo $hunari; ?></td>
            <td><?php echo $topar; ?></td>
            <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
            <td><?php echo $TassyklananDerejesi; ?></td>
            <td class="back" style="white-space: nowrap;"><a onClick="javascript: return confirm('Siz hakykatdanam <?php echo $ady."-y(i)"; ?>  toparyňdan aýyrmakçymy!');"  href="index.php?page=toparym&bashgaTopar=<?php echo $id;?>">Toparyňdan aýyr</a></td>
            <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam <?php echo $ady."-y(i)"; ?>  udalit etmekçimi!');" class="delete" href="index.php?page=toparym&delete=<?php echo $id;?>">Delete</a></td>
        </tr>
<?php } } ?> 
<!-- Function1 END -->


<?php
function AhliToparym($var,$faculty){
        $connect = mysqli_connect('localhost','root','','oguzhan');
        $query = "SELECT * FROM agzalar where topary = '$var' and fakulteti = '$faculty' order by id desc";
        $result = mysqli_query($connect,$query);
        $id_count=0;$TassyklananDerejesi='';

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id']; $id_count++;  
        $name = $row['name'];
        $surname = $row['surname'];
        $ady = $name." ".$surname;
        $hunari = $row['hunari'];
        $topar = $row['topary'];
        $suraty = $row['suraty'];
        $tassyknama = $row['berlen_derejesi'];
    if($tassyknama == 0){$TassyklananDerejesi='Talyp';}else if($tassyknama==4){$TassyklananDerejesi='Starsta';}
    else{$TassyklananDerejesi='Gurnakcy';}
?>

    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td><?php echo $topar; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        <td><?php echo $TassyklananDerejesi; ?></td>
         <td class="back" style="white-space: nowrap;"><a onClick="javascript: return confirm('Siz hakykatdanam <?php echo $ady."-y(i)"; ?>  toparyňdan aýyrmakçymy!');"  href="index.php?page=toparym&bashgaTopar=<?php echo $id;?>">Toparyňdan aýyr</a></td>
        <td class="back"><a onClick="javascript: return confirm('Siz hakykatdanam <?php echo $ady."-y(i)"; ?>  udalit etmekçimi!');" class="delete" href="index.php?page=toparym&delete=<?php echo $id;?>">Delete</a></td>


    </tr>

<?php } } ?>     