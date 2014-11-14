<?php
//include_once('simple_html_dom.php');
require ('phpQuery/phpQuery.php');

class Parser{

	private $name;
	private $href;
	private $html;
	
	private $product_link;
	private $name_product_link;
	private $img_product_link;
	private $price_product_link;
	private $href_product_link;
	private $description_product_link;
	
	public function __construct($name, $href)
    {
        $this->name = $name;
        $this->href = $href;
		$text = file_get_contents($this->href);
        $this->html = phpQuery::newDocument($text);
    }
	
	public function clear()
	{
		unset($this->name);
		unset($this->href);
		unset($this->html);
		unset($this->product_link);
		unset($this->name_product_link);
		unset($this->img_product_link);
		unset($this->price_product_link);
		unset($this->href_product_link);
		unset($this->description_product_link);
	}
	
	public function setHref($href)
	{
		$text = file_get_contents($this->href);
        $this->html = phpQuery::newDocument($text);
	}
	
	public function setProductLink($product_link)
	{
		$this->product_link=$product_link;		
	}
	
	public function setNameProductLinkType($name_product_link,$type)
	{
		$this->name_product_link['link']=$name_product_link;
		$this->name_product_link['type']=$type;
	}

	public function setImgProductLinkType($img_product_link,$type)
	{
		$this->img_product_link['link']=$img_product_link;	
		$this->img_product_link['type']=$type;
	}
	
	public function setPriceProductLinkType($price_product_link,$type)
	{
		$this->price_product_link['link']=$price_product_link;	
		$this->price_product_link['type']=$type;	
	}
	
	public function setHrefProductLinkType($href_product_link,$type)
	{
		$this->href_product_link['link']=$href_product_link;	
		$this->href_product_link['type']=$type;
	}
	
	public function setDescriptionProductLinkType($description_product_link,$type)
	{
		$this->description_product_link['link']=$description_product_link;	
		$this->description_product_link['type']=$type;
	}
	
	private function getElement($element)
	{
			$item['name_product']=$this->getNameProduct($element);
			$item['img_product']=$this->getImgProduct($element);
			$item['price_product']=$this->getPriceProduct($element);
			$item['href_product']=$this->getHrefProduct($element);
			$item['description_product']=$this->GetDescriptionProduct($element);
			return $item;
	}

	private function getNameProduct($element)
	{		
			return $this->getResult($element,$this->name_product_link);
	}
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	private function getImgProduct($element)
	{
	return $this->getResult($element,$this->img_product_link);
	/*
			$res;
			$res=$this->getResult($element,$this->img_product_link);
			$a=parse_url($res);			
			if ($a['scheme']!='' && $a['host']!='')
				return $res;
			else
			{
				$a=parse_url($this->href);
				return $a['scheme'].':'.'\\'.'\\'.$a['host'].$res;
			}
			*/
	}
	
	private function getPriceProduct($element)
	{		
			return $this->getResult($element,$this->price_product_link);
	}

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!	
	private function getHrefProduct($element)
	{
	return $this->getResult($element,$this->href_product_link);
	/*
			$res;
			$res=$this->getResult($element,$this->href_product_link);
			$a=parse_url($res);			
			if ($a['scheme']!='' && $a['host']!='')
				return $res;
			else
			{
				$a=parse_url($this->href);
				return $a['scheme'].':'.'\\'.'\\'.$a['host'].$res;
			}
			*/
	}
	
	private function GetDescriptionProduct($element)
	{
			return $this->getResult($element,$this->description_product_link);
	}

	public function getAllProducts()
	{
		$items=array();
		$i=0;
		$products = $this->html->find($this->product_link);
		foreach($products as $pq)
		{
			$element = pq($pq); // Это аналог $ в jQuery
			$item=$this->getElement($element);
			$items[$i]=$item;
			$i++;
		}
		return $items;
			
	}
			
	private function getResult($str,$link_type)
	{
		if ($link_type['type']=='text')
				return $str->find($link_type['link'])->text();
		else
				return $str->find($link_type['link'])->attr($link_type['type']);
	}
	
	function view_result ($array_result)
	{
		echo '<h2>Всего найдено '.count($array_result).' элементов</h2><br>';
		foreach ($array_result as $element)
		{
			echo '<p>Название продукта: '.$element['name_product'].'</p>';
			echo '<p>Описание продукта: '.$element['description_product'].'</p>';
			echo '<p>Цена продукта: '.$element['price_product'].'</p>';
			echo '<a href="'.$element['img_product'].'"><p>Изображение продукта</p></a>';
			echo '<a href="'.$element['href_product'].'"><p>Ссылка продукта</p></a><br>';
		}
	}
}


?>