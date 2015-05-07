<?php

$cc = '广东省';

$bb = myclass::sysSubStr($cc,strlen($cc));

//print_r($bb);

$Arr2 =  myclass::sysSubStr($cc,strlen($cc)-3);     //去掉省这个字

//print_r($Arr2);

$newprovinceName = implode("",$Arr2);

print_r($newprovinceName);
class myclass{
    
    /**
     * 将字符串分解成数组.例如:$cc = '广东省';    sysSubStr($cc,strlen($cc));   返回的是:Array ( [0] => 广 [1] => 东 [2] => 省 )
     * @param unknown $string
     * @param unknown $length
     * @return string
     */
    public static function sysSubStr($string,$length)
    {
        $i = 0;
        while ($i < $length)
        {
            $stringTMP = substr($string,$i,1);
            if ( ord($stringTMP) >=224 )
            {
                $stringTMP = substr($string,$i,3);
                $i = $i + 3;
            }
            elseif( ord($stringTMP) >=192 )
            {
                $stringTMP = substr($string,$i,2);
                $i = $i + 2;
            }
            else
            {
                $i = $i + 1;
            }
            $stringLast[] = $stringTMP;
            //$stringLast = implode("",$stringLast);
        }
        return $stringLast;
    }
    
}

