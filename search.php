<?php 

function listFolderFiles($dir){
	
	//====================================
	$str = 'b'; // Searchable string here
	//====================================
	
    $ffs = scandir($dir);
    echo '<ol>';
    foreach($ffs as $ff){
        if($ff != '.' && $ff != '..'){
			$myFile = $ff;
            echo '<li>'.$ff;
            if(is_dir($dir.'/'.$ff)) { listFolderFiles($dir.'/'.$ff); }
			if(file_exists($ff)){
               $file = file_get_contents($ff);
				if(strpos($file, $str)) 
				{
				   echo " **** Alert! String found: <strong>" . $str . "</strong>";
				}
				else {
				   echo " Clean ";
				}
            }
            echo '</li>';
        }
    }
    echo '</ol>';
}

$dir = __DIR__;

listFolderFiles( $dir );

?>
