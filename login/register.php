<?php
    
    header("content-type:text/html;charset=utf8");

    include('public.php');
    //接收用户信息
    $userName = $_REQUEST['uName'];
    $pwd = $_REQUEST['upwd'];

    //echo "名字".$userName.'密码'.$pwd;


    //信息比对（如果数据库里有该名称则不让注册。）

    //查询数据库里面是否有该名称
    $sql = "select * from userinfo where uname='$userName'";

    //执行sql语句
    $res = mysqli_query($connect,$sql);

    //获取查询的信息
    $arr = mysqli_fetch_assoc($res);
    
    //判断    如果count($arr)不为0  说明用用户名存在则返回register,html
    if(count($arr)){
        echo "<script>alert('用户名存在请重新注册');location.href='register.html'</script>";
    }else{
        //网数据里面填写信息
        $insert = "insert into userinfo (uname,pwd) values ('$userName','$pwd')";
        $res1 = mysqli_query($connect,$insert);
        if($res1){
            echo "<script>alert('注册成功');location.href='login.html'</script>";
        }
    }

?>