
        <?php
            include_once('./system/libs/Main.php');
            include_once('./system/libs/DController.php');
            include_once './system/libs/Load.php';
            include_once './system/libs/DModel.php';
            include_once './system/libs/Database.php';
            //include_once ('../app/Views/home.php');

            //include_once('../system/libs/Load.php');
           // $main = new Main();
           
            echo '<br>';
            $url  = isset($_GET['url']) ? $_GET['url'] : NULL;
           
            
            if($url !=NULL){
                $url = rtrim($url, '/');
                $url = explode('/', filter_var($url, FILTER_SANITIZE_URL));
            }else{
               unset($url); 
            }
            if(isset($url[0])){
                include_once('./app/Controller/'.$url[0].'.php');
                $controller = new $url[0]();

                if(isset($url[2])){
                    $controller->{$url[1]}($url[2]);
                }else{
                    if(isset($url[1])){
                        $controller->{$url[1]}();

                    }
                }
            }else{
                include_once('./app/Controller/index.php');
                $index = new index();
                $index->homepage();
            }
        
        ?>
 