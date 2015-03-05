<?php

//分隔符
/*
经常使用的分隔符是正斜线(/)、hash符号(#) 以及取反符号(~)。下面的例子都是使用合法分隔符的模式。 
/foo bar/
#^[^0-9]$#
+php+
%[a-zA-Z0-9_-]%
如果分隔符需要在模式内进行匹配，它必须使用反斜线进行转义。
如果分隔符经常在 模式内出现， 一个更好的选择就是是用其他分隔符来提高可读性。 

 */


/*
1.\ 将下一个字符标记为一个特殊字符、或一个原义字符、或一个 向后引用、或一个八进制转义符。
例如，'n' 匹配字符 "n"。'\n' 匹配一个换行符。序列 '\\' 匹配 "\" 而 "\(" 则匹配 "("。  

2.^ 匹配输入字符串的开始位置。如果设置了 RegExp 对象的 Multiline 属性，^ 也匹配 '\n' 或 '\r' 之后的位置。  
3.$ 匹配输入字符串的结束位置。如果设置了RegExp 对象的 Multiline 属性，$ 也匹配 '\n' 或 '\r' 之前的位置。  

4.* 匹配前面的子表达式零次或多次。例如，zo* 能匹配 "z" 以及 "zoo"。* 等价于{0,}。  
5.+ 匹配前面的子表达式一次或多次。例如，'zo+' 能匹配 "zo" 以及 "zoo"，但不能匹配 "z"。+ 等价于 {1,}。  

6.? 匹配前面的子表达式零次或一次。例如，"do(es)?" 可以匹配 "do" 或 "does" 中的"do" 。? 等价于 {0,1}。  
7.{n} n 是一个非负整数。匹配确定的 n 次。例如，'o{2}' 不能匹配 "Bob" 中的 'o'，但是能匹配 "food" 中的两个 o。  
8.{n,} n 是一个非负整数。至少匹配n 次。例如，'o{2,}' 不能匹配 "Bob" 中的 'o'，但能匹配 "foooood" 中的所有 o。'o{1,}' 等价于 'o+'。'o{0,}' 则等价于 'o*'。  
9.{n,m} m 和 n 均为非负整数，其中n <= m。最少匹配 n 次且最多匹配 m 次。
例如，"o{1,3}" 将匹配 "fooooood" 中的前三个 o。'o{0,1}' 等价于 'o?'。请注意在逗号和两个数之间不能有空格。  
10.? 当该字符紧跟在任何一个其他限制符 (*, +, ?, {n}, {n,}, {n,m}) 后面时，匹配模式是非贪婪的。
非贪婪模式尽可能少的匹配所搜索的字符串，而默认的贪婪模式则尽可能多的匹配所搜索的字符串。例如，对于字符串 "oooo"，'o+?' 将匹配单个 "o"，而 'o+' 将匹配所有 'o'。  
11.. 匹配除 "\n" 之外的任何单个字符。要匹配包括 '\n' 在内的任何字符，请使用象 '[.\n]' 的模式。  
12.(pattern) 匹配 pattern 并获取这一匹配。所获取的匹配可以从产生的 Matches 集合得到，在VBScript 中使用 SubMatches 集合，
在JScript 中则使用 $0…$9 属性。要匹配圆括号字符，请使用 '\(' 或 '\)'。  
13.(?:pattern) 匹配 pattern 但不获取匹配结果，也就是说这是一个非获取匹配，不进行存储供以后使用。
这在使用 "或" 字符 (|) 来组合一个模式的各个部分是很有用。例如， 'industr(?:y|ies) 就是一个比 'industry|industries' 更简略的表达式。  
14.(?=pattern) 正向预查，在任何匹配 pattern 的字符串开始处匹配查找字符串。这是一个非获取匹配，也就是说，该匹配不需要获取供以后使用。
例如，'Windows (?=95|98|NT|2000)' 能匹配 "Windows 2000" 中的 "Windows" ，
但不能匹配 "Windows 3.1" 中的 "Windows"。预查不消耗字符，也就是说，在一个匹配发生后，在最后一次匹配之后立即开始下一次匹配的搜索，而不是从包含预查的字符之后开始。  
15.(?!pattern) 负向预查，在任何不匹配 pattern 的字符串开始处匹配查找字符串。这是一个非获取匹配，也就是说，该匹配不需要获取供以后使用。
例如'Windows (?!95|98|NT|2000)' 能匹配 "Windows 3.1" 中的 "Windows"，但不能匹配 "Windows 2000" 中的 "Windows"。
预查不消耗字符，也就是说，在一个匹配发生后，在最后一次匹配之后立即开始下一次匹配的搜索，而不是从包含预查的字符之后开始  
16.x|y 匹配 x 或 y。例如，'z|food' 能匹配 "z" 或 "food"。'(z|f)ood' 则匹配 "zood" 或 "food"。  
17.[xyz] 字符集合。匹配所包含的任意一个字符。例如， '[abc]' 可以匹配 "plain" 中的 'a'。  
18.[^xyz] 负值字符集合。匹配未包含的任意字符。例如， '[^abc]' 可以匹配 "plain" 中的'p'。  
19.[a-z] 字符范围。匹配指定范围内的任意字符。例如，'[a-z]' 可以匹配 'a' 到 'z' 范围内的任意小写字母字符。  
20.[^a-z] 负值字符范围。匹配任何不在指定范围内的任意字符。例如，'[^a-z]' 可以匹配任何不在 'a' 到 'z' 范围内的任意字符。  
21.\b 匹配一个单词边界，也就是指单词和空格间的位置。例如， 'er\b' 可以匹配"never" 中的 'er'，但不能匹配 "verb" 中的 'er'。  
22.\B 匹配非单词边界。'er\B' 能匹配 "verb" 中的 'er'，但不能匹配 "never" 中的 'er'。  
23.\cx 匹配由 x 指明的控制字符。例如， \cM 匹配一个 Control-M 或回车符。x 的值必须为 A-Z 或 a-z 之一。否则，将 c 视为一个原义的 'c' 字符。  
24.\d 匹配一个数字字符。等价于 [0-9]。  
25.\D 匹配一个非数字字符。等价于 [^0-9]。  
26.\f 匹配一个换页符。等价于 \x0c 和 \cL。  
27.\n 匹配一个换行符。等价于 \x0a 和 \cJ。  
28.\r 匹配一个回车符。等价于 \x0d 和 \cM。  
29.\s 匹配任何空白字符，包括空格、制表符、换页符等等。等价于 [ \f\n\r\t\v]。  
30.\S 匹配任何非空白字符。等价于 [^ \f\n\r\t\v]。  
31.\t 匹配一个制表符。等价于 \x09 和 \cI。  
32.\v 匹配一个垂直制表符。等价于 \x0b 和 \cK。  
33.\w 匹配包括下划线的任何单词字符。等价于'[A-Za-z0-9_]'。  
34.\W 匹配任何非单词字符。等价于 '[^A-Za-z0-9_]'。  
35.\xn 匹配 n，其中 n 为十六进制转义值。十六进制转义值必须为确定的两个数字长。例如，'\x41' 匹配 "A"。'\x041' 则等价于 '\x04' & "1"。
正则表达式中可以使用 ASCII 编码。.  
36.\num 匹配 num，其中 num 是一个正整数。对所获取的匹配的引用。例如，'(.)\1' 匹配两个连续的相同字符。  
37.\n 标识一个八进制转义值或一个向后引用。如果 \n 之前至少 n 个获取的子表达式，则 n 为向后引用。否则，如果 n 为八进制数字 (0-7)，则 n 为一个八进制转义值。  
38.\nm 标识一个八进制转义值或一个向后引用。如果 \nm 之前至少有 nm 个获得子表达式，则 nm 为向后引用。
如果 \nm 之前至少有 n 个获取，则 n 为一个后跟文字 m 的向后引用。如果前面的条件都不满足，若 n 和 m 均为八进制数字 (0-7)，则 \nm 将匹配八进制转义值 nm。  
39.\nml 如果 n 为八进制数字 (0-3)，且 m 和 l 均为八进制数字 (0-7)，则匹配八进制转义值 nml。  
40.\un 匹配 n，其中 n 是一个用四个十六进制数字表示的 Unicode 字符。例如， \u00A9 匹配版权符号 (?)。 



常用的正则表达式
    1、非负整数：”^\d+$”
    2、正整数：”^[0-9]*[1-9][0-9]*$”
    3、非正整数：”^((-\d+)|(0+))$”
    4、负整数：”^-[0-9]*[1-9][0-9]*$”
    5、整数：”^-?\d+$”
    6、非负浮点数：”^\d+(\.\d+)?$”
 7、正浮点数：”^((0-9)+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$”
    8、非正浮点数：”^((-\d+\.\d+)?)|(0+(\.0+)?))$”
    9、负浮点数：”^(-((正浮点数正则式)))$”
    10、英文字符串：”^[A-Za-z]+$”
    11、英文大写串：”^[A-Z]+$”
    12、英文小写串：”^[a-z]+$”
    13、英文字符数字串：”^[A-Za-z0-9]+$”
    14、英数字加下划线串：”^\w+$”
    15、E-mail地址：”^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$”
    16、URL：”^[a-zA-Z]+://(\w+(-\w+)*)(\.(\w+(-\w+)*))*(\?\s*)?$”
 */


//例子
/*
验证域名
 检验一个字符串是否是个有效域名.
$url = "http://komunitasweb.com/";  
if (preg_match('/^(http|https|ftp)://([A-Z0-9][A-Z0-9_-]*(?:.[A-Z0-9][A-Z0-9_-]*)+):?(d+)?/?/i', $url)) {  
    echo "Your url is ok.";  
} else {  
    echo "Wrong url.";  
}  

表单验证匹配
 
验证账号，字母开头，允许 5-16 字节，允许字母数字下划线：^[a-zA-Z][a-zA-Z0-9_]{4,15}$
验证账号，不能为空，不能有空格，只能是英文字母：^\S+[a-z A-Z]$
验证账号，不能有空格，不能非数字：^\d+$
验证用户密码，以字母开头，长度在 6-18 之间：^[a-zA-Z]\w{5,17}$
验证是否含有 ^%&',;=?$\ 等字符：[^%&',;=?$\x22]+
匹配Email地址：\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*
匹配腾讯QQ号：[1-9][0-9]{4,}
匹配日期，只能是 2004-10-22 格式：^\d{4}\-\d{1,2}-\d{1,2}$
匹配国内电话号码：^\d{3}-\d{8}|\d{4}-\d{7,8}$
 评注：匹配形式如 010-12345678 或 0571-12345678 或 0831-1234567
匹配中国邮政编码：^[1-9]\d{5}(?!\d)$
匹配身份证：\d{14}(\d{4}|(\d{3}[xX])|\d{1})
 评注：中国的身份证为 15 位或 18 位
不能为空且二十字节以上：^[\s|\S]{20,}$
 
 
 
字符匹配

匹配由 26 个英文字母组成的字符串：^[A-Za-z]+$
匹配由 26 个大写英文字母组成的字符串：^[A-Z]+$ 
匹配由 26 个小写英文字母组成的字符串：^[a-z]+$ 
匹配由数字和 26 个英文字母组成的字符串：^[A-Za-z0-9]+$ 
匹配由数字、26个英文字母或者下划线组成的字符串：^\w+$ 
匹配空行：\n[\s| ]*\r 
匹配任何内容：[\s\S]* 
匹配中文字符：[\x80-\xff]+ 或者 [\xa1-\xff]+ 
只能输入汉字：^[\x80-\xff],{0,}$
匹配双字节字符(包括汉字在内)：[^\x00-\xff]
 
 
 
匹配数字
 
只能输入数字：^[0-9]*$ 
只能输入n位的数字：^\d{n}$ 
只能输入至少n位数字：^\d{n,}$ 
只能输入m-n位的数字：^\d{m,n}$ 
匹配正整数：^[1-9]\d*$ 
匹配负整数：^-[1-9]\d*$ 
匹配整数：^-?[1-9]\d*$
匹配非负整数（正整数 + 0）：^[1-9]\d*|0$ 
匹配非正整数（负整数 + 0）：^-[1-9]\d*|0$
匹配正浮点数：^[1-9]\d*\.\d*|0\.\d*[1-9]\d*$ 
匹配负浮点数：^-([1-9]\d*\.\d*|0\.\d*[1-9]\d*)$ 
匹配浮点数：^-?([1-9]\d*\.\d*|0\.\d*[1-9]\d*|0?\.0+|0)$ 
匹配非负浮点数（正浮点数 + 0）：^[1-9]\d*\.\d*|0\.\d*[1-9]\d*|0?\.0+|0$ 
匹配非正浮点数（负浮点数 + 0）：^(-([1-9]\d*\.\d*|0\.\d*[1-9]\d*))|0?\.0+|0$
 
 
 
其他
 
匹配HTML标记的正则表达式（无法匹配嵌套标签）：<(\S*?)[^>]*>.*?</\1>|<.*? /> 
匹配网址 URL ：[a-zA-z]+://[^\s]*
匹配 IP 地址：((25[0-5]|2[0-4]\d|[01]?\d\d?)\.){3}(25[0-5]|2[0-4]\d|[01]?\d\d?) 
匹配完整域名：[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+\.?


 */

?>