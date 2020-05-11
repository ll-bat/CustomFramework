<?php


class Router
{
    /**
     * @var IRequest
     */
    private  $request;
    private array $routes = [];
    private array $postRoutes= [];

    public function __construct(IRequest $req)
    {
        $this->request = $req;
    }

    public function get($r, $call){
        $this->routes[$r] = $call;
    }
    public function post($r, $call){
        $this->postRoutes[$r] = $call;
    }
    public function __destruct()
    {
        $path = $this->request->getPath();
//       $call = false;
        if($this->request->getMethod()== 'get')
            $call = $this->routes[$path] ?? false;
        else
            $call = $this->postRoutes[$path] ?? false;
        if ($call){
//           var_dump($call);
            if (is_string($call)){
                $this->view($call);
            }
            else {
                call_user_func_array($call, array($this->request, $this));
            }
        }
        else
            echo '404 file not found';
    }
    public function view($call, $params = []){
        $content = $this->getContent($call, $params);
        require_once __DIR__.'/view/layout.php';
    }
    public function getContent($view, $params = []){
        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        require_once __DIR__."/view/{$view}.php";
        return ob_get_clean();
    }
}