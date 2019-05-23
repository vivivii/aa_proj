            <?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("错误执行");
    }

    include('connect.php');//链接数据库
    $name = $_POST['name'];//post获得用户名表单值
    $password = $_POST['password'];//post获得用户密码单值

    if ($name && $password){
        try{
             $sql = 'SELECT * FROM users WHERE username = ? AND password=?;';
             //$result = $db ->query($sql);
             $pdo = $db->prepare($sql);
             $result = $pdo->execute([$name,$password]);
             var_dump($result->fetchAll());
                        }
             catch(PDOException $e){
                 $e -> getMessage();
             }
             if($result){
                   header("refresh:0;url=welcome.html");//如果成功跳转至welcome.html页面
                   exit;
             }
             else{
                echo "<script>alert('用户名或密码错误！'); history.go(-1);</script>";
             }
             

    }else{
                echo "<script>alert('表单填写不完整！'); history.go(-1);</script>";
    }
?>
