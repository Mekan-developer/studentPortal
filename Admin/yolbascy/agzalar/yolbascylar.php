<?php ob_start(); ?>
<div class="scroll">
<table border="" align="center">
    <thead>
        <tr>
            <th>id</th>
            <th>Ady</th>
            <th>Familyasy</th>                     
            <th>Hünäri</th>
            <th>Suraty</th>                     
            <th>Derejesi</th>
        </tr>
    </thead>
    <tbody align="center">
<?php
    $connect = mysqli_connect('localhost','root','','oguzhan');
    $query = "SELECT * FROM agzalar where derejesi='mugallym' and fakulteti = '$fakulteti' and berlen_derejesi=3 order by id desc";
    $result = mysqli_query($connect,$query);
    $id_count=0;$TassyklananDerejesi='';

    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id']; $id_count++;  
        $name = $row['name'];
        $surname = $row['surname'];
        $hunari = $row['hunari'];
        $suraty = $row['suraty'];
?>

    <tr>
        <td><?php echo $id_count ;  ?></td>
        <td><?php echo $name ; ?></td>
        <td><?php echo $surname; ?></td>
        <td><?php echo $hunari; ?></td>
        <td ><a target="_blank" href="../../register/img/<?php echo $suraty?>"><img class="agzalar_imgg" src="../../register/img/<?php echo $suraty ?>"></a></td>
        <td>ýolbaşçy</td>
        

    </tr>

<?php }
?>

<?php 
if(isset($_GET['update'])){
        $update = $_GET['update'];
        $id = $_GET['id'];
    if($update=='delete'){           
        $query = "DELETE FROM agzalar WHERE id = $id";              
    }else if($update=='mug'){
        $query = "UPDATE agzalar SET berlen_derejesi=0 WHERE id = $id";
    }else if($update=='Zam'){
        $query = "UPDATE agzalar SET berlen_derejesi=2 WHERE id = $id";
    }
    $result = mysqli_query($connect,$query);

header ("Location:index.php?page=yolbascy") ;
ob_end_flush();
}
?>
    </tbody>
</table>
</div>