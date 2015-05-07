<form action="" method="post">
     <p>提交关键词:<input type="text" name="title" /></p>
     <p><input type="submit" value="POST" /></p>
<br />
<br />
<br />
</form>


<?php
    if(count($_POST)==1){
        //表示有表单提交啦...
        $title = $_POST['title'];
        if($title==''){
             echo '提交关键词不能为空...';
             return ;
        }
        //这里应该把提交的$title,逐字分割成数组,例如提交的标题是:"你好,世界";
        //那么$Title_Array,这个数组就应该是这样的.
        /*
                索引 [0] = "你"
                索引 [1] = "好"
                索引 [2] = ","
                索引 [3] = "世"
                索引 [4] = "界"
        */
        //但是我不知道在php怎么实现....

        $data_Array = explode("\n",file_get_contents('.\关键词.txt'));//读入data.txt,并用\n进行分割.

        for($i=0;$i != count($Title_Array);$i++){

        	for($n=0;$n != count($data_Array);$n++){

            	$xgx = Getxgx($Title_Array,$data_Array[$n]);
               if($xgx>$syxgx){//当前相关性大于上一个相关性.
            	    $syxgx = $xgx;//记录最大值
            		$sy = $n;//记录最大值的成员索引
    	       }
        	}
        	if($sy!=0){
        	   echo $data_Array[$sy].'<br />';//输出最大值..
        	}
            $syxgx = 0;//还原一下.
            $sy = 0;//还原一下.
        }
}


class test{
    
    public function Getxgx($Title_Array,$data){
        for($i=0;$i != count($Title_Array);$i++){

            $int1 = strpos($data,$Title_Array[i]);
            if($int1>=1){
                if($int2+1 == $int1){
                    //判断上一个字符串是否与提交的title上一字符串相同,如果相同则相关性+连续相同次数*3
                    $lianxu = $lianxu + 1;
                    $int_xgx = $int_xgx + $lianxu * 3;
                    $int2 = $int1;
                    continue ;
                }
                $int_xgx = $int_xgx + 2;
            } else {
                $int_xgx = $int_xgx - 1;
                if($lianxu!=0){
                    $lianxu = $lianxu - 1;//找不到相同的字符串,相关性减1
                }
            }
    
        }
        return $int_xgx;
    }
    
}

