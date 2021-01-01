<?php
  if (!isset($_POST['bake-submit']))
  {
    header('Location: index.php');
  }
  //Create new directory from source.
  //Please note that this function was borrowed from https://www.geeksforgeeks.org/copy-the-entire-contents-of-a-directory-to-another-directory-in-php/.
  function custom_copy($src, $dst) {  
    // Open the source directory .
    $dir = opendir($src);  

    //Make the destination directory if it doesn't exist.
    @mkdir($dst);  

    //Loop through the files in the source directory.
    while( $file = readdir($dir) ) {  

      if (( $file != '.' ) && ( $file != '..' )) {  
        if ( is_dir($src . '/' . $file) )  
        {  

          // Recursively calling custom copy function 
          // for sub directory  
          custom_copy($src . '/' . $file, $dst . '/' . $file);  

        }  
        else {  
          copy($src . '/' . $file, $dst . '/' . $file);  
        }  
      }  
    }      
    closedir($dir); 
  }  
    
  $src = $_POST['src'];
  //Source copy of SaaS. Modify to suit your needs. This might be located on an S3 server, or on another file sharing system. Must be a valid URL.
    
  $dst = $_POST['zipdst']."openbake".time();
  //Destination copy of SaaS. Must be server writeable. Notice how a timestamp is included for the purposes of preventing identical output bakes.
  
  custom_copy($src, $dst);
  //Create a temporary copy of the source for modification.

  $targetFile = $dst.$_POST['target'];
  //The location of the config file, or the file that you are changing when you bake, inside of the destination bake.

  $find = $_POST['find'];
  //Text in file to replace. Change to suit your needs.

  $replace = $_POST['replace'];
  //In this case we are setting 'code' to 1234567890. For your case, you might want to set it to a unique product key which you then enter in a database that can be retrieved by OpenVerify or similar programs.

  file_put_contents($targetFile,str_replace($find,$replace,file_get_contents($targetFile)));
  //We replace the text in the file.

  $zipdst = $_POST['zipdst']."openbakezip".time().".zip";
  //Get the destination of the zip.

  require 'zip-folder.php';
  new GoodZipArchive($dst, $zipdst);
  //Zip the temp copy.

  //Delete the temp copy.
  removeFiles($dst);
  function removeFiles($target) {
    if(is_dir($target)){
      $files = glob( $target . '*', GLOB_MARK );
      foreach( $files as $file ){
        removeFiles( $file );      
      }
      rmdir( $target );
    } else if(is_file($target)) {
      unlink( $target );  
    }
  }

  header('Location: index.php?success&path='.$zipdst)
?>