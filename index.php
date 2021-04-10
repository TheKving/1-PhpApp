<!-- 
    Execute CMD (LS) / Convert output CMD String to Array

-->
<?php 
    echo "<h1>EAC 2 - PHP+MySQL</h1>";
    $output = shell_exec('ls');
    $array = preg_split('/[\r\n]+/', $output);
    foreach($array as $id=>$file){
        if (strpbrk($file, ' ') !== false){
            echo '</br>';
            //echo $file;
        } else {
            if($file == 'index.php'){
                echo '</br>';
            } else {
                echo '<a href="./'.$file.'">'. strtoupper($file).'</a></br></br>';
            }           
        }
    }
?>
