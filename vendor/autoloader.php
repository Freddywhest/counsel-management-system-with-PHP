<?php
  spl_autoload_register(function($class){
    if(str_contains($class, '\\') || strpos($class, '\\') > 0){
        $class2 = explode('\\', $class);
        $class = end($class2);
    }
    if (is_readable($_SERVER['DOCUMENT_ROOT'].'/controllers/classes/'.$class . '.Class.php')) {
        include_once $_SERVER['DOCUMENT_ROOT'].'/controllers/classes/'.$class . '.Class.php';
    }  else if (is_readable($_SERVER['DOCUMENT_ROOT'].'/models/'.$class . '.Class.php')) {
        include_once $_SERVER['DOCUMENT_ROOT'].'/models/'.$class . '.Class.php';
    }

  });
    
/*   
 function myAutoLoad($class_name){
    $dirs = array(
        'controllers/classes/', // Project specific classes (+Core Overrides)
        'models/'   // Unit test classes, if using PHP-Unit
    );

    // Looping through each directory to load all the class files. It will only require a file once.
    // If it finds the same class in a directory later on, IT WILL IGNORE IT! Because of that require once!
    foreach( $dirs as $dir ) {
        if(str_contains($class_name, '\\') || strpos($class_name, '\\') > 0){
            $class = explode('\\', $class_name);

            if (file_exists($dir.end($class).'.Class.php')) {
                require_once($dir.end($class).'.Class.php');

            }
        }else if(file_exists($dir.$class_name.'.Class.php')){
            require_once($dir.$class_name.'.Class.php');

        }else{
            return;
        }
    }
 } */
