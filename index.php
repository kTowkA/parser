<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>тутуту</title>
        <meta http-equiv="description" content="" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/jmenu.css" type="text/css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jMenu.jquery.js"></script>
    </head>
    <body>

		<form id="myform" action="index.php" method="post">
			<input hidden="true" value="0" name="choise" id="value">
		</form>	
	
		<script type="text/javascript">
			function sub(a)
			{
					document.getElementById('value').value=a; 
					document.getElementById('myform').submit(); 
					return false;
			}
		</script>
		
		
        <ul id="jMenu">
            <li>
                <a>ZARA</a>
                <ul>
                    <li>
                        <a>Женщины</a>
                        <ul>
                            <li><a onclick=sub('1');>Верхняя одежда</a></li>
                            <li><a onclick=sub('2');>Жакеты</a></li>
                            <li><a onclick=sub('3');>Платья</a></li>
                            <li><a onclick=sub('4');>Комбинезоны</a></li>
                            <li><a onclick=sub('5');>Топы</a></li>
                        </ul>
                    </li>
                    <li><a>Мужчины</a></li>
                    <li>
                        <a>Дети</a>

                    </li>
                    <li><a>Мутанты</a></li>
                </ul>
            </li>

            <li>
                <a>2 магазин</a>
            </li>

            <li>
                <a>3 магазин</a>

            </li>

            <li>
                <a>4 магазин</a>

            </li>
        </ul>
		
<?php
//phpinfo();

include('Parser.php');  



function zara($pars)
{
		$pars->setProductLink('li.product');
		$pars->setNameProductLinkType('a.name','text');
		$pars->setImgProductLinkType('a.item > img.sbdraggable','data-src');
		$pars->setPriceProductLinkType('span.price span','data-ecirp');
		$pars->setHrefProductLinkType('a.name','href');
		$pars->setDescriptionProductLinkType('a','text');
		$pars->view_result($pars->getAllProducts());
}


if (isset($_POST['choise']))
{
	switch ($_POST['choise']){
		case '1': // Верхняя одежда 
			$pars=new Parser('zara','http://www.zara.com/ru/ru/%D0%B6%D0%B5%D0%BD%D1%89%D0%B8%D0%BD%D1%8B/%D0%B2%D0%B5%D1%80%D1%85%D0%BD%D1%8F%D1%8F-%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0-c269183.html');
			zara($pars);
			$pars->clear();
			break; 
		case '2': // Жакеты
			$pars=new Parser('zara','http://www.zara.com/ru/ru/%D0%B6%D0%B5%D0%BD%D1%89%D0%B8%D0%BD%D1%8B/%D0%B6%D0%B0%D0%BA%D0%B5%D1%82%D1%8B-c269184.html');
			zara($pars);
			$pars->clear();
			break; 
		case '3': // Платья
			$pars=new Parser('zara','http://www.zara.com/ru/ru/%D0%B6%D0%B5%D0%BD%D1%89%D0%B8%D0%BD%D1%8B/%D0%BF%D0%BB%D0%B0%D1%82%D1%8C%D1%8F-c269185.html');
			zara($pars);
			$pars->clear();
			break; 
		case '4': // Комбинезоны
			$pars=new Parser('zara','http://www.zara.com/ru/ru/%D0%B6%D0%B5%D0%BD%D1%89%D0%B8%D0%BD%D1%8B/%D0%BA%D0%BE%D0%BC%D0%B1%D0%B8%D0%BD%D0%B5%D0%B7%D0%BE%D0%BD%D1%8B-c663016.html');
			zara($pars);
			$pars->clear();
			break; 
		case '5': // Топы
			$pars=new Parser('zara','http://www.zara.com/ru/ru/%D0%B6%D0%B5%D0%BD%D1%89%D0%B8%D0%BD%D1%8B/%D1%82%D0%BE%D0%BF%D1%8B-c269186.html');
			zara($pars);
			$pars->clear();
			break; 
		default : break; //
	}
}
else
{
}
		//$url='http://www.letu.ru/parfyumeriya/zhenskaya-parfyumeriya?q_pageSize=24&q_docSortOrder=descending&viewAll=true';
		//$a=parse_url($url);
		//echo 's'.$a['scheme'].'<br>';
		//echo 'h'.$a['host'].'<br>';
		//echo 'q'.$a['query '].'<br>';
		//echo 'p'.$a['path'].'<br>';
		/*$pars=new Parser('zara','http://www.letu.ru/parfyumeriya/zhenskaya-parfyumeriya?q_pageSize=24&q_docSortOrder=descending&viewAll=true');
		$pars->setProductLink('div.productItem');
		$pars->setNameProductLinkType('div.productItemDescription > h3.productItemDescription a','text');
		$pars->setImgProductLinkType('div.imgContainer > a > img','src');
		$pars->setPriceProductLinkType('div.wrItemPrice > p.wrItemMinPrice','text');
		$pars->setHrefProductLinkType('div.imgContainer > a','href');
		$pars->setDescriptionProductLinkType('div.productItemDescription > h3.productItemDescription a','text');
		$pars->view_result($pars->getAllProducts());	
		$pars->clear();
		*/
		
/*
$pars=new Parser('zara','http://www.zara.com/ru/ru/%D0%B6%D0%B5%D0%BD%D1%89%D0%B8%D0%BD%D1%8B/%D0%B2%D0%B5%D1%80%D1%85%D0%BD%D1%8F%D1%8F-%D0%BE%D0%B4%D0%B5%D0%B6%D0%B4%D0%B0-c269183.html');
$pars->setProductLink('li.product');
$pars->setNameProductLinkType('a.name','text');
$pars->setImgProductLinkType('a.item > img.sbdraggable','data-src');
$pars->setPriceProductLinkType('span.price span','data-ecirp');
$pars->setHrefProductLinkType('a.name]','href');
$pars->setDescriptionProductLinkType('a','text');
$pars->getAllProducts();
$pars->clear();
*/
?>		


        <script type="text/javascript">
            $(document).ready(function() {
                $("#jMenu").jMenu({
                    openClick : false,
                    ulWidth :'auto',
                    TimeBeforeOpening : 100,
                    TimeBeforeClosing : 11,
                    animatedText : false,
                    paddingLeft: 1,
                    effects : {
                        effectSpeedOpen : 150,
                        effectSpeedClose : 150,
                        effectTypeOpen : 'slide',
                        effectTypeClose : 'slide',
                        effectOpen : 'swing',
                        effectClose : 'swing'
                    }

                });
            });
        </script>
    </body>
</html>


