<?php
namespace app\admin\controller;
use think\View;
use think\Controller;
use think\Session;
use think\Db;

class Index extends Controller
{

      //   $selectResult=Db::table('gs_article')//热点精选
      // ->join('gs_article_class','gs_article.article_class_id = gs_article_class.article_class_id')
      // ->select();

      //   $selectResult=Db::table('gs_article')//热点精选
      // ->where('gs_article.article_id',$id)
      // ->find();
          // $selectResult1=Db::table('gs_product')
          // ->where('product_name', $data['name'])
          // ->where('product_price',$data['price'])
          // ->value('product_id');

  // $data = input("post.");

            // Db::table('gs_article')->save([
            //       'apply_name'=>$data['name'],
            //       'apply_email'=>$data['email'], 
            //       'apply_tel'=>$data['tel'], 
            //       'apply_content'=>$data['content']
            //   ]);

                // Db::table('gs_article')->where('apply_id',$param)->update([
                //       'apply_status'=>1
                //   ]);
                  // Db::table('gs_article')->where('apply_id',$param)->delete();
  public function index()
  {
   $msg='ok';
   $selectResult=Db::table('pc_project')->limit(4)
  ->order('project_id desc')
   ->select();
   $data = array(  "personSelect" =>$selectResult);
   $result=array(  
    'msg'=>$msg,  
    'data'=>$data   
    );

   return json($result);
 }
 public function userRegister()
 {
   $msg='ok';
   $data = input("post.");
        // $time=date("Y-m-d H:i:s");
   Db::table('pc_user')->insert(
    [
    'username'=>$data['username'],
    'password'=>$data['password'], 
    'nickname'=>$data['nickname'], 
    'photo'=>$data['photo'],
    'sex'=>$data['sex'],
    'Introduction'=>$data['Introduction'], 
    'nickname'=>$data['nickname'], 
    'register_time'=>date("Y-m-d H:i:s")
    ]
    );
   $result=array(  
    'msg'=>$msg,  
              // 'data'=>$data   
    );

   return json($result);
 }
 public function personDetail($id)
 {
  $msg='ok';
          $res=Db::table('pc_project')//最新商品
          ->where('project_id',$id)
          ->find();

        $selectResult=Db::table('pc_appraise')//热点精选
      ->join('pc_user','pc_appraise.username = pc_user.username')
        ->where('project_product_id', $id)
        ->where('project_type_id', 1)
        ->select();


        $apprise = array(  "apprise" =>$selectResult);


        $data = array(  "detail" =>$res);
        $result=array(  
          'msg'=>$msg,  
          'data'=>$data ,
          'apprise'=>$apprise   
          );
        // $data = input("id.");
        return json($result);
      }


      public function add_cart()
      {
       $msg='ok';
       $data = input("post.");
        // $time=date("Y-m-d H:i:s");
       Db::table('pc_shopping')->insert(
        [
        'username'=>$data['username'],
        'project_id'=>$data['project_id'], 
        'project_type_id'=>$data['project_type_id'], 
        'project_product_remake'=>$data['project_product_remake'],
        'project_product_price'=>$data['project_product_price'],
        ]
        );
       $result=array(  
        'msg'=>$msg,  
              // 'data'=>$data   
        );

       return json($result);
     }



     public function order_edit()
     {
       $msg='ok';
       $data = input("post.");
        // $time=date("Y-m-d H:i:s");
       Db::table('pc_order')->where('orderId',$data['orderId'])->update([
        'status'=>$data['status'],
        ]);
                // $data = array(  "cart" =>$selectResult);
       $result=array(  
        'msg'=>$msg,  
             // 'data'=>$data   
        );

       return json($result);
     }









     public function cart()
     {
       $msg='ok';
       $data = input("post.");
        // $time=date("Y-m-d H:i:s");
        $selectResult=Db::table('pc_shopping')//热点精选
        ->join('pc_project','pc_shopping.project_id = pc_project.project_id')
        ->where('username', $data['username'])
        ->select();
        $data = array(  "cart" =>$selectResult);
        $result=array(  
          'msg'=>$msg,  
          'data'=>$data   
          );

        return json($result);
      }
      public function cart_delete()
      {
       $msg='ok';
       $data = input("post.");
       Db::table('pc_shopping')->where('username',$data['username'])->where('cart_id',$data['cart_id'])->delete();
                // $data = array(  "cart" =>$selectResult);
       $result=array(  
        'msg'=>$msg,  
        'data'=>$data   
        );

       return json($result);
     }


     public function cart_submit()
     {
       $msg='ok';
       $data = input("post.");
         // $shoppro = input('post.arrayData/a'); 

       $hello = explode(',',$data['arrayData']);

       $pro = explode(',',$data['proId']);


       $remake = explode(',',$data['remake']);

       $person_price = explode(',',$data['person_price']);


       for ($i = 0; $i < count($hello); $i++) {

        Db::table('pc_shopping')->where('username',$data['username'])->where('cart_id',$hello[$i])->delete();
      }

      $Oid = $this->pro_orderid();
      Db::table('pc_order')->insert(
        [
        'orderId'=>$Oid,
        'username'=>$data['username'], 
        'orderDate'=>date("Y-m-d H:i:s"), 
        'totalPrice'=>$data['sum'],
        'status'=>'未审阅',
        ]
        );

      for ($i = 0; $i < count($hello); $i++) {
       Db::table('pc_orderdetail')->insert(
        [
        'orderId'=>$Oid,
        'project_product_id'=>$pro[$i], 
        'project_type_id'=>1, 
        'project_product_remake'=>$remake[$i],
        'project_product_price'=>$person_price[$i],
        ]
        );
     }
     for ($i = 0; $i < count($hello); $i++) {
      Db::table('pc_project')->where('project_id',$pro[$i])->setInc('project_num',1);
    }


// $shoppro = explode ( ',', $label_array );


         // $result[] = $shoppro.split(",");



        //         // $data = array(  "cart" =>$selectResult);
        //  $result=array(  
        //   'msg'=>$msg,  
        //      'data'=>$data   
        //   );

    return json($pro);
  }

  public function order()
  {
         // $msg='ok';
   $data = input("post.");

        $selectResult=Db::table('pc_order')//热点精选
        ->join('pc_orderdetail','pc_order.orderId = pc_orderdetail.orderId')
        ->join('pc_project','pc_orderdetail.project_product_id = pc_project.project_id')
        ->where('pc_order.username',$data['username'])
        ->select();


        $dataOrderDetail = array(  "dataOrder" =>$selectResult);


        $selectResult1=Db::table('pc_order')
        ->where('pc_order.username',$data['username'])//热点精选
        ->select();
        $dataOrder = array(  "dataOrder" =>$selectResult1);
        $result=array(  
          // 'msg'=>$msg,  
          'order'=>$dataOrder,
          'orderDetail'=>$dataOrderDetail,
          );

        return json($result);
      }

      public function apprise_order()
      {
         // $msg='ok';

       $data = input("post.");

       Db::table('pc_appraise')->insert(
        [
        'username'=>$data['username'],
        'project_product_id'=>$data['proId'], 
        'appraise_content'=>$data['content'], 
        'project_type_id'=>$data['proTypeId'],
        'rate'=>$data['rate'],
        ]
        );
       Db::table('pc_orderdetail')->where('order_id',$data['order_id'])->update([
        'state'=>1
        ]);

       $res=Db::table('pc_orderdetail')->where('orderId',$data['orderId'])
       ->where('state',0)
       ->find();

       if($res)
       {
        $f=0;
      }
      else
      {
        Db::table('pc_order')->where('orderId',$data['orderId'])->update([
          'status'=>'结束订单'
          ]);
        $f=1;
      }

      $result=array(  
              // 'msg'=>$msg,  
        'data'=>$data,
        'state'=>$f,
        );

      return json($result);
    }


    public function admin_order()
    {
         // $msg='ok';

        $selectResult=Db::table('pc_order')//热点精选
        ->join('pc_orderdetail','pc_order.orderId = pc_orderdetail.orderId')
        ->join('pc_project','pc_orderdetail.project_product_id = pc_project.project_id')
        ->select();


        $dataOrderDetail = array(  "dataOrder" =>$selectResult);


        $selectResult1=Db::table('pc_order')//热点精选
        ->select();
        $dataOrder = array(  "dataOrder" =>$selectResult1);
        $result=array(  
          // 'msg'=>$msg,  
          'order'=>$dataOrder,
          'orderDetail'=>$dataOrderDetail,
          );

        return json($result);
      }
      public function pro_orderid()
      {
        $s_time = "";
        $s_time .= date("Y");
        $s_time .= date("m");
        $s_time .= date("d");
        $s_time .= date("H");
        $s_time .= date("i");
        $s_time .= date("s");
        $s_time .= mt_rand(10000, 99999);
        return $s_time;
      }


      public function question()
      {

          $selectResult=Db::table('pc_question_type')//热点精选
        // ->join('pc_orderdetail','pc_order.orderId = pc_orderdetail.orderId')
        // ->join('pc_project','pc_orderdetail.project_product_id = pc_project.project_id')
          ->select();
          $result=array(  
          // 'msg'=>$msg,  
            'data'=>$selectResult,
          // 'orderDetail'=>$dataOrderDetail,
            );
          return json($result);
        }

        public function question_select()
        {

          $selectResult=Db::table('pc_question')
         ->join('pc_question_type','pc_question_type.question_type_id = pc_question.question_type_id')//热点精选
         ->select();
         $result=array(  
          // 'msg'=>$msg,  
          'data'=>$selectResult,
          // 'orderDetail'=>$dataOrderDetail,
          );
         return json($result);
       }

       public function question_sumbit()
       {
         $data = input("post.");



         Db::table('pc_question')->insert(
          [
          'username'=>$data['username'],
          'question_time'=>date("Y-m-d H:i:s"), 
          'question_content'=>$data['question_content'], 
          'question_price'=>$data['question_price'],
          'question_key'=>$data['question_key'],
          'question_type_id'=>$data['question_type_id'], 
          ]
          );

         $result=array(  
          // 'data'=>$selectResult,
          'yuanshi'=>$data 
          );
         return json($result);
       }

       public function question_slove()
       {
         $data = input("post.");

         Db::table('pc_question')->where('question_id',$data['question_id'])->update([
          'solve_content1'=>$data['solve_content1'],
          'solve_content2'=>$data['solve_content2'],
          'solve_time'=>date("Y-m-d H:i:s"),
          'state'=>1
          ]);
         $result=array(  
          // 'msg'=>$msg,  
          'data'=>$data,
          // 'orderDetail'=>$dataOrderDetail,
          );
         return json($result);
       }


       public function open_slove()
       {
         $data = input("post.");

         $selectResult=Db::table('pc_question')
        ->where('username',$data['username'])//热点精选
         ->where('state','<>',0)//热点精选
         ->select();


         Db::table('pc_question')->where('username',$data['username'])->where('state',1)->update([
          'state'=>-1
          ]);

         Db::table('pc_apply')->where('username',$data['username'])->where('state',1)->update([
          'state'=>-1
          ]);



         $selectResult1=Db::table('pc_apply')
        ->where('username',$data['username'])//热点精选
         // ->where('flag',1)//热点精选
         ->find();

         $result=array(  
          // 'msg'=>$msg,  
          'data'=>$selectResult,
          'apply'=>$selectResult1,
          // 'orderDetail'=>$dataOrderDetail,
          );
         return json($result);
       }

       public function open_index()
       {
         $data = input("post.");

         $selectResult=Db::table('pc_question')
        ->where('username',$data['username'])//热点精选
        ->where('state',1)//热点精选
        ->count();

         $f=Db::table('pc_apply')
        ->where('username',$data['username'])//热点精选
        ->where('state',1)//热点精选
        ->count();

        $selectResult=$selectResult+$f;
        $result=array(  
          // 'msg'=>$msg,  
          'data'=>$selectResult,
          // 'orderDetail'=>$dataOrderDetail,
          );
        return json($result);
      }


      public function user_select()
      {
                   // $data = input("post.");

        $selectResult=Db::table('pc_user')
        ->select();

        $result=array(  
          // 'msg'=>$msg,  
          'data'=>$selectResult,
          // 'orderDetail'=>$dataOrderDetail,
          );
        return json($result);
      }
      public function user_edit()
      {
       $data = input("post.");

       Db::table('pc_user')->where('username',$data['username'])->update([
        'freeze'=>$data['freeze']
        ]);

       $result=array(  

          // 'orderDetail'=>$dataOrderDetail,
        );
       return json($result);
     }

     public function product_show($id="")
     {
              $where['project_name'] = ['like', '%' . $id . '%'];

         $selectResult=Db::table('pc_project')
         ->where($where)
         ->select();
       $result=array(  

          'data'=>$selectResult,
        );
       return json($result);
     }

     public function apply_type()
     {
              // $where['project_name'] = ['like', '%' . $id . '%'];

         $selectResult=Db::table('pc_question_type')
         // ->where($where)
         ->select();
       $result=array(  

          'data'=>$selectResult,
        );
       return json($result);
     }   
     public function apply_submit()
     {
         $data = input("post.");


        $selectResult=Db::table('pc_apply')
        ->where('username',$data['username'])//热点精选
         ->find();

if($selectResult)
{
  $msg="no";
}
else
{
         Db::table('pc_apply')->insert(
          [
          'name'=>$data['name'],
          // 'phone'=>date("Y-m-d H:i:s"), 
          'phone'=>$data['phone'], 
          'education'=>$data['education'],
          'field'=>$data['field'],
          'sex'=>$data['sex'], 
          'introduce'=>$data['introduce'], 
          'username'=>$data['username'], 
          ]
          );
           $msg="ok";
}
       $result=array(  
'msg'=>$msg,
          'data'=>$data,
        );
       return json($result);
     }

     public function apply_select()
     {
         // $data = input("post.");

        $selectResult=Db::table('pc_apply')
        ->where('state',0)//热点精选
         ->select();
       $result=array(  

          'data'=>$selectResult,
        );
       return json($result);
     }

     public function apply_edit()
     {
         $data = input("post.");
       Db::table('pc_apply')->where('id',$data['id'])->update([
        'state'=>$data['state'],
        'flag'=>$data['state']
        ]);
$selectResult="";
if($data['state']==1)
{

        $selectResult=Db::table('pc_apply')
        ->where('pc_apply.username',$data['username'])//热点精选
         ->join('pc_user','pc_apply.username = pc_user.username')
         ->find();

         Db::table('pc_admin')->insert(
          [
          'admin'=>$selectResult['username'],
          // 'phone'=>date("Y-m-d H:i:s"), 
          'password'=>$selectResult['password'], 
          'type'=>3,
          ]
          );
}
       $result=array(  

          'data'=>$data,
           'data1'=>$selectResult,
        );
       return json($result);
     }



   }
