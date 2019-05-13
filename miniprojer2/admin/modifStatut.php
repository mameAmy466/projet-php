
<?php 
  session_start();
  if($_SESSION["auturiser"]!="yes"){
    header("Location:../index.php");
    exit;
  }
if(isset($_GET['log'])){
 $fp =fopen('newuser.txt','r');
 $md=fopen('mod.txt','w');

    while (!feof($fp))
    {
        $ligne=trim(fgets($fp));
        $user=explode(",",$ligne);
        if($user[0]==($_GET['log']) && $user[0]!="awa") 
        {
            if($user[5]=='Bloquer')
            {
                $user[5]='Debloquer';  
            }
            else{
                $user[5]='Bloquer';
                }
        }
$modif=$user[0].",".$user[1].",".$user[2].",".$user[3].",".$user[4].",".$user[5].",".$user[6]."\n";
$newline=$newline.$modif;  
    } 
    fputs($md,trim($newline));
 fclose($fp);
 fclose($md);
 $fp='../newuser.txt';
$md='mod.txt';
unlink($fp);
rename($md,$fp);
header("Location:listerutilisateur.php");
}
?>
