<?php
header('Content-type: text/json');


$msg='ok';
$stauts=0;
$data=array(

  //  "comingList"=>[array=>("id"=>1239282,"haspromotionTag"=>false)],

);
$user = array(  
    "comingList" => array( 
    [        
        "id"=>1239282,
        "haspromotionTag"=>false,
        "img"=>"http://p0.meituan.net/w.h/movie/297895f07d4e2009898a991f82f2e80b4874837.jpg",
        "version"=> "",
        "nm"=> "红花绿叶",
        "preShow"=> false,
        "sc"=> 0,
        "globalReleased"=> false,
        "wish"=>1064,
        "star"=>"马思琪,罗克旺,张玲",
        "rt"=> "2019-08-05",
        "showInfo"=> "2019-08-05 下周一上映",
        "showst"=> 4,
        "wishst"=> 0,
        "comingTitle"=> "8月5日 周一"],
    [        
        "id"=> 1197417,
        "haspromotionTag"=> false,
        "img"=> "http://p0.meituan.net/w.h/movie/4ce0104f223d0df60340f40f01c561391345060.jpg",
        "version"=> "",
        "nm"=> "使徒行者2：谍影行动",
        "preShow"=> false,
        "sc"=> 0,
        "globalReleased"=> false,
        "wish"=> 335274,
        "star"=> "张家辉,古天乐,吴镇宇",
        "rt"=> "2019-08-07",
        "showInfo"=> "2019-08-07 下周三上映",
        "showst"=> 4,
        "wishst"=> 0,
        "comingTitle"=> "8月7日 周三"]
    )
); 


$fruits = array (
    "status"=>$stauts,
    "msg"=>$msg,
    "data"  =>$user,
    
);
echo json_encode($fruits);
?>