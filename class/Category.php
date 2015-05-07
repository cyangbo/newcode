 
<?php
/**无限级分类信息格式化工具类-五种方式
 * 分类信息格式化工具类
 */
  
class Category {
    protected $sonName;
    protected $parentName;
  
    /**
     * 初始化工作
     * @param string $son    子类标识的名称
     * @param string $parent 父类标识的名称
     */
    public function __construct($son = 'id', $parent = 'pid') {
        $this->sonName = $son;
        $this->parentName = $parent;
    }
  
    /**
     * 根据传递的父类ID获取所有的子级分类
     * 组合一维数组
     * @param  [type]  $data 分类数组
     * @param  integer $pid  父类id
     * @param  integer $lev  父类所属层级
     * @return [type]        格式化后的数组信息
     */
    public function unlimitedForLevel($data, $pid = 0, $lev = 0) {
        $arr = array();
  
        foreach($data as $v) {
            if($v[$this->parentName] == $pid) {
                $v['lev'] = $lev + 1;
                $arr[] = $v;
                $arr = array_merge($arr, self::unlimitedForLevel($data, $v[$this->sonName], $lev + 1));
            }
        }
  
        return $arr;
    }
  
    /**
     * 根据传递的父类ID获取所有的子级分类
     * 组合多维数组
     * @param  [type]  $data 分类数组
     * @param  integer $pid  父类id
     * @return [type]        格式化后的数组信息
     */
    public function unlimitedForLayer($data, $pid = 0) {
        $arr = array();
  
        foreach($data as $v) {
            if($v[$this->parentName] == $pid) {
                $v['children'] = self::unlimitedForLayer($data, $v[$this->sonName]);
                $arr[] = $v;
            }
        }
  
        return $arr;
    }
  
    /**
     * 根据传递子类ID获取所有的父级分类
     * @param  [type]  $data 分类数组
     * @param  integer $id   子类id
     * @return [type]        父类数组信息
     */
    public function getParents($data, $id) {
        $arr = array();
  
        foreach($data as $v) {
            if($v[$this->sonName] == $id) {
                $arr[] = $v;
                $arr = array_merge(self::getParents($data, $v[$this->parentName]), $arr);
            }
        }
  
        return $arr;
    }
  
    /**
     * 根据传递的父类ID获取所有的子级分类ID
     * 注意返回值中不包括传递进来的父类ID
     * @param  [type] $data 分类数组
     * @param  [type] $pid  父类id
     * @return [type]       子类id数组
     */
    public function getChildsID($data, $pid) {
        $arr =array();
  
        foreach($data as $v) {
            if($v[$this->parentName] == $pid) {
                $arr[] = $v[$this->sonName];
                $arr = array_merge($arr, self::getChildsID($data, $v[$this->sonName]));
            }
        }
  
        return $arr;
    }
  
    /**
     * 根据传递的子类ID获取所有的父类ID
     * 注意返回值中不包括传递进来的子类ID
     * @param  [type] $data 分类数组
     * @param  [type] $id   子类id
     * @return [type]       父类id数组
     */
    public function getParentsID($data, $id) {
        $arr = array();
  
        foreach($data as $v) {
            if($v[$this->sonName] == $id) {
                $arr[] = $v[$this->parentName];
                $arr = array_merge($arr, self::getParentsID($data, $v[$this->parentName]));
            }
        }
  
        return $arr;
    }
}
//该片段来自于http://www.codesnippet.cn/detail/1004201512191.html