 
<?php
/**
 * 文件缓存类，增加前缀清理功能
 */
namespace Think\\Cache\\Driver;
  
use Think\\Cache;
  
defined('THINK_PATH') or exit();
  
/**
 * 文件类型缓存类
 */
class File extends Cache {
  
    /**
     * 架构函数
     * @access public
     */
    public function __construct($options = array()) {
        if (!empty($options)) {
            $this->options = $options;
        }
        $this->options['temp'] = !empty($options['temp']) ? $options['temp'] : C('DATA_CACHE_PATH');
        $this->options['prefix'] = isset($options['prefix']) ? $options['prefix'] : C('DATA_CACHE_PREFIX');
        $this->options['expire'] = isset($options['expire']) ? $options['expire'] : C('DATA_CACHE_TIME');
        $this->options['length'] = isset($options['length']) ? $options['length'] : 0;
        $this->options['temp'] = rtrim($this->options['temp'], '\\\\/') . DIRECTORY_SEPARATOR;
        $this->init();
    }
  
    /**
     * 初始化检查
     * @access private
     * @return boolean
     */
    private function init() {
        // 创建应用缓存目录
        if (!is_dir($this->options['temp'])) {
            mkdir($this->options['temp']);
        }
    }
  
    /**
     * 取得变量的存储文件名
     * @access private
     * @param string $name 缓存变量名
     * @return string
     */
    private function filename($name) {
        $name = md5(C('DATA_CACHE_KEY') . $name);
        if (C('DATA_CACHE_SUBDIR')) {
            // 使用子目录
            $dir = '';
            for ($i = 0; $i < C('DATA_PATH_LEVEL'); $i++) {
                $dir .= $name{$i} . DIRECTORY_SEPARATOR;
            }
            if (!is_dir($this->options['temp'] . $dir)) {
                mkdir($this->options['temp'] . $dir, 0755, true);
            }
            $filename = $dir . $this->options['prefix'] . $name . '.tmp';
        } else {
            $filename = $this->options['prefix'] . $name . '.tmp';
        }
        return $this->options['temp'] . $filename;
    }
  
    /**
     * 读取缓存
     * @access public
     * @param string $name 缓存变量名
     * @return mixed
     */
    public function get($name) {
        $filename = $this->filename($name);
        if (!is_file($filename)) {
            return false;
        }
        N('cache_read', 1);
        $content = file_get_contents($filename);
        if (false !== $content) {
            $expire = (int) substr($content, 8, 12);
            if ($expire != 0 && time() > filemtime($filename) + $expire) {
                //缓存过期删除缓存文件
                unlink($filename);
                return false;
            }
            if (C('DATA_CACHE_CHECK')) {//开启数据校验
                $check = substr($content, 20, 32);
                $content = substr($content, 52);
                if ($check != md5($content)) {//校验错误
                    return false;
                }
            } else {
                $content = substr($content, 20);
            }
            if (C('DATA_CACHE_COMPRESS') && function_exists('gzcompress')) {
                //启用数据压缩
                $content = gzuncompress($content);
            }
            $content = unserialize($content);
            return $content;
        } else {
            return false;
        }
    }
  
    /**
     * 写入缓存
     * @access public
     * @param string $name 缓存变量名
     * @param mixed $value  存储数据
     * @param int $expire  有效时间 0为永久
     * @return boolean
     */
    public function set($name, $value, $expire = null) {
        N('cache_write', 1);
        if (is_null($expire)) {
            $expire = $this->options['expire'];
        }
        $filename = $this->filename($name);
        $data = serialize($value);
        if (C('DATA_CACHE_COMPRESS') && function_exists('gzcompress')) {
            //数据压缩
            $data = gzcompress($data, 3);
        }
        if (C('DATA_CACHE_CHECK')) {//开启数据校验
            $check = md5($data);
        } else {
            $check = '';
        }
        $data = "<?php\\n//" . sprintf('%012d', $expire) . $check . $data;
        $result = file_put_contents($filename, $data);
        if ($result) {
            if ($this->options['length'] > 0) {
                // 记录缓存队列
                $this->queue($name);
            }
            clearstatcache();
            return true;
        } else {
            return false;
        }
    }
  
    /**
     * 删除缓存
     * @access public
     * @param string $name 缓存变量名
     * @return boolean
     */
    public function rm($name) {
        if ($name == '%') {
            return $this->clearDir($this->options['temp'], true, $this->options['prefix']);
        } else {
            return $this->clearDir($this->filename($name));
        }
    }
  
    /**
     * 清除缓存
     * @access public
     * @param string $name 缓存变量名
     * @return boolean
     */
    public function clear() {
        return $this->clearDir($this->options['temp']);
    }
  
    /**
     * 清空目录
     * @param string $dir 目录路径
     * @param boolean $stay 是否保留目录
     * @param string $pattern 文件筛选规则
     * @return boolean
     */
    protected function clearDir($dir, $stay = true, $pattern = null) {
        if (is_dir($dir)) {
            $dir = rtrim($dir, '\\\\/') . DIRECTORY_SEPARATOR;
            $list = array_merge(glob($dir . '*', GLOB_ONLYDIR), glob($dir . "{$pattern}*.*", GLOB_NOSORT));
            foreach ($list as $file) {
                $this->clearDir($file, !is_null($pattern), $pattern);
            }
            $stay || $stay = rmdir($dir);
        } elseif (is_file($dir)) {
            return unlink($dir);
        }
        return $stay;
    }
  
}
//该片段来自于http://www.codesnippet.cn/detail/3004201512465.html