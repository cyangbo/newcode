{$articletitle}	<br/>
{$arr.title}<br/>
{$arr['title']}<br/>
{$arr.author}<br/>
{$article|capitalize}<br/>
{$article|cat:".yesterday":"第三个参数"}<br/>
{$timeee|date_format:"%A,%B,%e,%Y,%H:%M:%S"}<br/>
{$no_name|default:"i am a default name"}<br/>
{$arr.author|default:"nonono"}<br/>
{$url_escape|escape:"url"}<br/>
{$low_up|lower}<br/>
{$low_up|upper}<br/>
{$huanhang|nl2br}<br/>
{$huanhang}<br/>
{if $score gt 90}
优秀
{elseif $score gt 60}
及格
{else}
不及格
{/if}<br/>

{section name=article loop=$art_section max=5}
	{$art_section[article].title}<br />
	{$art_section[article].author}<br />
	{$art_section[article].content}<br />
	<br />
{/section}

{foreach item=article from=$art_foreach}
	{$article.title}<br />
	{$article.author}<br />
	{$article.content}<br />
<br />
{/foreach}

{foreach $art_foreach as $article }
	{$article.title}<br />
	{$article.author}<br />
	{$article.content}<br />
<br />
{/foreach}

{include file="header.tpl" sitename="我是一个网站标题"}
<br />
{$objcc->meth1(array('苹果','ss'))}<br />

{"Y-m-d"|date:$timecc}<br />


{'d'|str_replace:'h':$strc}<br />
{f_test p1='abc' p2='edf'}<br />


{test width=150 height=200}<br />


{$timett|test:'Y-m-d H:i:s'}<br />


{replacecc replace='true' maxnum=29}
	{$str}
{/replacecc}