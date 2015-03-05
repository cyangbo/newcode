<?php
function relset_UC_key ($string){
     $arraygn = strlen ($string);
     $debuger = '';
     for($one = 0;$one < $arraygn;$one += 2){
         $debuger .= pack ("C", hexdec (substr ($string, $one, 2)));
     }
     return $debuger;
}

$cc = relset_UC_key ('62616964757C676F6F676C657C736F676F757C736F736F7C7961686F6F7C62696E677C626F747C7370696465727C736F7C3336307C616E7175616E');
print_r($cc);
echo "<br/>";

$cc = relset_UC_key ('687474703A2F2F777777352E64616E6763693232322E636F6D2F');
print_r($cc);
echo "<br/>";
$cc = relset_UC_key ('%B2%A9%B2%CA');
print_r($cc);
echo "<br/>";

$cc = relset_UC_key ('%b2%a9%b2%ca');
print_r($cc);
echo "<br/>";


print_r(relset_UC_key ('2f6170692f696e6465782e706870'));
echo "<br/>";


        /* $retueby = array(
            0 => relset_UC_key ('3f643d'),
             1 => relset_UC_key ('26733d'),
             2 => relset_UC_key ('26763d'),
             3 => relset_UC_key ('26723d'),
             4 => relset_UC_key ('636f6e74656e742d547970653a20746578742f68746d6c3b20636861727365743d676232333132'),
             5 => relset_UC_key ('687474703a2f2f'),
             6 => relset_UC_key ('5b30785370696465725d')
            );
            
            print_r($retueby);

      $arrgpe = array(
            'tid' => array('%B2%A9%B2%CA', '%b2%a9%b2%ca', '687474703A2F2F777777352E64616E6763693232322E636F6D2F'),
            
            );
            
            $arrgps = array_keys ($arrgpe);
            
            print_r($arrgps);*/
?>