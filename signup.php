<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("错误执行");
    }

    $name=$_POST['name'];
    $password=$_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $confirm=$_POST['confirm'];
    if($name == "" || $password == "" || $confirm == "")  
        {  
            echo "<script>alert('请确认信息完整性！'); history.go(-1);</script>";  
        } 
    
    else
    {
        if($password == $confirm)
        {
            include('connect.php');
            //$sql = $db->prepare('SELECT * FROM users WHERE username = :name');
            //$sql->bindValue(':name',$name);
            //$sql->execute();
            //$num=$sql->fetch(PDO::FETCH_ASSOC);

            //$con = $db -> query($sql);
            //$num = mysqli_num_rows($con);
            
            //这里要判断用户名是否已注册

            if(num) echo "<script>alert('用户名已注册！'); history.go(-1);</script>";     
            else{
                $q = $db ->prepare('INSERT INTO users(username,password) VALUES (:name,:password);');
                $q -> bindValue(':name', $name);
                $q -> bindValue(':password', $password);
                $result = $q->execute();
        
                if ($result == true){
                    echo "注册成功";
                }
                else echo "注册失败";
            }
        }
        else 
        {  
            echo "<script>alert('密码不一致！'); history.go(-1);</script>";  
        }  
    }

?>
