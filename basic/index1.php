<form action="" method="post">
     <p>�ύ�ؼ���:<input type="text" name="title" /></p>
     <p><input type="submit" value="POST" /></p>
<br />
<br />
<br />
</form>


<?php
    if(count($_POST)==1){
        //��ʾ�б��ύ��...
        $title = $_POST['title'];
        if($title==''){
             echo '�ύ�ؼ��ʲ���Ϊ��...';
             return ;
        }
        //����Ӧ�ð��ύ��$title,���ַָ������,�����ύ�ı�����:"���,����";
        //��ô$Title_Array,��������Ӧ����������.
        /*
                ���� [0] = "��"
                ���� [1] = "��"
                ���� [2] = ","
                ���� [3] = "��"
                ���� [4] = "��"
        */
        //�����Ҳ�֪����php��ôʵ��....

        $data_Array = explode("\n",file_get_contents('.\�ؼ���.txt'));//����data.txt,����\n���зָ�.

        for($i=0;$i != count($Title_Array);$i++){

        	for($n=0;$n != count($data_Array);$n++){

            	$xgx = Getxgx($Title_Array,$data_Array[$n]);
               if($xgx>$syxgx){//��ǰ����Դ�����һ�������.
            	    $syxgx = $xgx;//��¼���ֵ
            		$sy = $n;//��¼���ֵ�ĳ�Ա����
    	       }
        	}
        	if($sy!=0){
        	   echo $data_Array[$sy].'<br />';//������ֵ..
        	}
            $syxgx = 0;//��ԭһ��.
            $sy = 0;//��ԭһ��.
        }
}


class test{
    
    public function Getxgx($Title_Array,$data){
        for($i=0;$i != count($Title_Array);$i++){

            $int1 = strpos($data,$Title_Array[i]);
            if($int1>=1){
                if($int2+1 == $int1){
                    //�ж���һ���ַ����Ƿ����ύ��title��һ�ַ�����ͬ,�����ͬ�������+������ͬ����*3
                    $lianxu = $lianxu + 1;
                    $int_xgx = $int_xgx + $lianxu * 3;
                    $int2 = $int1;
                    continue ;
                }
                $int_xgx = $int_xgx + 2;
            } else {
                $int_xgx = $int_xgx - 1;
                if($lianxu!=0){
                    $lianxu = $lianxu - 1;//�Ҳ�����ͬ���ַ���,����Լ�1
                }
            }
    
        }
        return $int_xgx;
    }
    
}

