<?php

//返回字符串格式
function get_str($id=0){
    $conn=mysqli_connect('localhost','root','','mytp','3306');
    global $str;
    $sql="select id,title from class where pid={$id}";
    $result=mysqli_query($conn,$sql);
    if ($result&&mysqli_affected_rows($conn)){
        $str.='<ul>';
        while ($row=mysqli_fetch_array($result)){
            $str.='<li>'.$row['id'].'--'.$row['title'].'</li>';
            get_str($row['id']);
        }
        $str.='</ul>';
    }
    return $str;
}

echo get_str(0);

//返回数组格式
function get_array($id=0){
    $conn=mysqli_connect('localhost','root','','mytp','3306');
    $arr=array();
    $sql="select id,title from class where pid={$id}";
    $result=mysqli_query($conn,$sql);
    if ($result&&ysqli_affected_rows($conn)){
        while ($row=mysqli_fetch_array($result)){
            $row['list']=get_array($row['id']);
            $arr[]=$row;
        }
        
    }
    return $arr;
}

//$list=get_array(0);
//print_r($list);
////输出json格式
//echo json_encode($list);