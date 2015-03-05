<?php
class contacts
{
    var $db;
    var $base;
    function __construct(&$base)
    {
        $this->contacts($base);
    }
    function contacts(&$base)
    {
        $this->base = $base;
        $this->db = $base->db;
    }
    /*
	*/
    function get_cts($sql)
    {
        $arr = $this->db->fetch_all($sql);
        foreach($arr as $k => $v)
        {
            $arr[$k] = $v;
        }
        return $arr;
    }
    function saveadd()
    {
        $name = getgpc('name', 'P');
        $sex = getgpc('sex', 'P');
        $mobi = getgpc('mobi', 'P');
        $email = getgpc('email', 'P');
        $addr = getgpc('addr','P');
        return $this->db->query("INSERT INTO `contacts`(
                                                    `id` , 
                                                    `name` , 
                                                    `sex` , 
                                                    `mobile` , 
                                                    `email` , 
                                                    `address` ) 
                                                VALUES (NULL , '$name', '$sex', '$mobi', '$email', '$addr')");
    }
    function edit()
    {
        $id = getgpc('id', 'R');
        return  $this->db->fetch_first("SELECT * FROM contacts WHERE `id` = $id");
    }
    function saveedit()
    {
        $name = getgpc('name','P');
        $sex = getgpc('sex','P');
        $mobi = getgpc('mobi','P');
        $email = getgpc('email','P');
        $addr = getgpc('addr','P');
        $id = getgpc("id",'P');
        return $this->db->query("UPDATE `contacts` SET `name`= '$name' , `sex` = '$sex', `mobile` = '$mobi',
                                                       `email` = '$email', `address`= '$addr' WHERE id = '$id'");
    }
    function del()
    {
        $id = getgpc('id','R');
        return $this->db->query("DELETE FROM  `contacts` WHERE `id` = '$id'");
    }
}
?>