<?php
    header("content-type:text/html;charset=utf8");

    include('public.php');

    //获取用户输入登陆信息
    $userName = $_REQUEST['uName'];
    $pwd = $_REQUEST['upwd'];


    //查询数据库是否有$userName；
    $sql = "select * from userinfo where uname='$userName'";

    $res = mysqli_query($connect,$sql);
    //获取查询到的信息
    $arr = mysqli_fetch_assoc($res);

    print_r($arr['pwd']);

    if(count($arr)){
        //用户名存在，继续判断密码
        if($arr['pwd'] == $pwd){
            echo "<script>location.href='https://www.baidu.com'</script>";
        }else{
            echo "<script>alert('密码错误，重新登陆');location.href='login.html'</script>";
        }
    }else{
        echo "<script>alert('用户名不存在，重新登陆');location.href='login.html'</script>";
    }
?>