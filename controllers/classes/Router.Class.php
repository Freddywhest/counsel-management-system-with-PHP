<?php 
declare(strict_types = 1);


namespace controllers\classes;

class Router{
    private array $routes;
    private array $callback;
    private bool $installed;
    private $routeFound;

    public function __construct(){
        $_SERVER['PHP_SELF'] = strtolower(parse_url($_SERVER['REQUEST_URI'])['path']);
        $_SERVER['SCRIPT_NAME'] = strtolower(parse_url($_SERVER['REQUEST_URI'])['path']);
    }

    public function newRoute(string $route, callable|string $callback){
        /* (\d+)/? */
        if(strpos(strtolower($route), ":id")){
            $route = str_replace(':id','(\d+)/?', strtolower($route));
        }else if(strpos(strtolower($route), ":slug")){
            $route = str_replace(':slug','([0-9-a-z]+)/?', strtolower($route));
        }
        $this->routes[] = strtolower($route);
        $this->callback[] = $callback;
    }

    public function handler($uriPath){
        $this->routeFound = null;
        if(file_exists($_SERVER['DOCUMENT_ROOT'].'/controllers/classes/database.Class.php')){
            if(class_exists('DataBase')){
                $this->installed = true;
            }else{
                unlink($_SERVER['DOCUMENT_ROOT'].'/controllers/classes/database.Class.php');
                $this->installed = false;
                exit();
            }
        }else{
            $this->installed = false;
            exit();
            
        }
        foreach ($this->routes as $key => $value) {
            if(preg_match("%^{$value}$%", $uriPath, $matches )){
                if(count($matches) > 1){
                    unset($matches[0]);
                    $matches = array_values($matches);

                }
                $this->routeFound = $value;
                if(is_string($this->callback[$key])){
                    $handlerClass = explode('@', $this->callback[$key]);
                    $handlerClass = array_values(array_filter($handlerClass));
                    $className = $handlerClass[0];
                    $functionName = $handlerClass[1];
                    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/controllers/classes/'.$className.'.Class.php')){
                        require_once $_SERVER['DOCUMENT_ROOT'].'/controllers/classes/'.$className.'.Class.php';
                        if(class_exists( $className)){
                            $class = new $className;
                            if(method_exists($class, $functionName)){
                                $class->$functionName($matches[0]); 
    
                            } else {
                                throw new \Exception($functionName. ' method does not exist in '. $className .' class.');
                            }

                        } else {
                            throw new \Exception($className. ' class does not exist.');
                        }
                    }else{
                        throw new \Exception($className. ' class not found in classes folder.');
                    }
                }else if(is_callable($this->callback[$key])){
                    $this->callback[$key]($matches[0]);
                }

            }
    
        }

    }

    public function run(){
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $uriPath = strtolower($requestUri['path']);
        $this->handler(uriPath: $uriPath);
    }


    public function __destruct(){
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $uriPath = strtolower($requestUri['path']);
        if(!$this->installed){
            if($uriPath === '/installation'){
                foreach ($this->routes as $key => $value) {
                    if($value === $uriPath){
                        $this->callback[$key]();
                        return;
                    }
                }
            }
            session_destroy();
            include $_SERVER['DOCUMENT_ROOT'].'/views/install.phtml';
        
        }else if(!$this->routeFound){
            if(file_exists($_SERVER['DOCUMENT_ROOT'].'/views/404.phtml')){
                include $_SERVER['DOCUMENT_ROOT'].'/views/404.phtml';
            }else if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/views/404.phtml') && $_SERVER['HTTP_HOST'] === 'localhost'){
                echo '<span style="text-align:center">
                    <h1>404: Page not found.</h1> <p>The requested URL was not found on this server.</p><hr>
                    <p><i>You can customize the 404 page by add your custom 404 page file </i><b>(NB: name the file 404.php)</b> <i>to "views" folder</i>
                    </p></span>
                ';
                
            }else{
                echo '<span style="text-align:center">
                <h1>404: Page not found.</h1> <p>The requested URL was not found on this server.</p><hr>
                </span>
            ';
            }
        }
    }
}
