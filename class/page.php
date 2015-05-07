 
<?php
/**简单好用的分页类 page.class.php
 * page.class.php 分页类
 */
class page
{
    public static $url;
    public static $page;
    public static $total;
    public static $size;
    public static $number;
    public static $max;
  
    public static $action = array('previous', 'number', 'next');
  
    public static function show($url, $page, $total, $size=10, $number=11)
    {
        self::$url = $url;
        self::$page = $page;
        self::$total = $total;
        self::$size = $size;
        self::$number = $number;
        self::$max = ceil($total / $size);
  
        $str = '';
        foreach (self::$action as $name)
            $str .= self::$name();
        return $str;
    }
  
    public static function first()
    {
        if (self::$page > 2)
        {
            $url = self::url(1);
            return "<li id=\\"pbfirst\\"><a href=\\"{$url}\\" title=\\"首页\\">首页</a></li>";
        }
    }
  
    public static function previous()
    {
        if (self::$page > 1)
        {
            $url = self::url(self::$page - 1);
            return "<li id=\\"pbprevious\\"><a href=\\"{$url}\\" title=\\"上一页\\">上一页</a></li>";
        }
    }
  
    public static function number()
    {
        $str = '';
        $f = self::$number % 2 ? (self::$number - 1) / 2 : self::$number / 2;
        $s = self::$page - $f;
        $e = self::$page + $f;
  
        if (self::$page < ($f + 1))
        {
            $s = 1;
            $e = self::$number;
            $e = $e > self::$max ? self::$max : $e;
        }
  
        if (self::$page > (self::$max - $f))
        {
            $s = self::$max - self::$number;
            $s = $s < 1 ? 1 : $s;
            $e = self::$max;
        }
  
        for ($i=$s; $i<=$e; $i++)
        {
            $url = self::url($i);
            if ($i == self::$page)
                $str .= "<li><strong>{$i}</strong></li>";
            else
                $str .= "<li><a href=\\"{$url}\\" title=\\"第{$i}页\\">{$i}</a></li>";
        }
        return $str;
    }
  
    public static function next()
    {
        if (self::$page < self::$max)
        {
            $url = self::url(self::$page + 1);
            return "<li id=\\"pbnext\\"><a href=\\"{$url}\\" title=\\"下一页\\">下一页</a></li>";
        }
    }
  
    public static function end()
    {
        if ((self::$max - self::$page) > 1)
        {
            $url = self::url(self::$max);
            return "<li id=\\"pbend\\"><a href=\\"{$url}\\" title=\\"末页\\">末页</a></li>";
        }
    }
  
    public static function url($page)
    {
        return str_replace('{page}', $page, self::$url);
    }
}
//该片段来自于http://www.codesnippet.cn/detail/0405201512473.html