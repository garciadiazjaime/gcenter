<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Miscellaneous{


	public function __contruct()
	{
		parent::__contruct();
	}
	
	public function decodeURL($values)
	{
		$fields;
		$a = explode('&', $values);
		$i = 0;
		while ($i < count($a)) {
			$b = explode ('=', $a[$i]);
			$fields[htmlspecialchars(urldecode($b[0]))] = htmlspecialchars(urldecode($b[1]));
			$i++;
		}
		return $fields;
	}
	
	public function printMENU($uri)
	{
		$response = '
				';
		$title = '';
		$href = '';
		$submenu = '';
		$class = '';
		$xml = simplexml_load_file(base_url().'resources/xml/menu.xml');
		foreach($xml->children() as $child)
		{
			$submenu = '';
			if(isset($child->child)){
				$tmp = $child->child;
				foreach($tmp->children() as $row){
					$title = ucfirst($row->title);
					$href = base_url().$child->href."/".$row->href;
					$li_id = isset($child->li_id) ? $row->li_id : '';
					$submenu .= "<li><a href=\"".$href."\" title=\"".$title."\" id=\"".$li_id."\"><span>".$title."</span></a></li>";
				}
				if(!empty($submenu)) $submenu = "<ul>".$submenu."</ul>";
			}
			
			if($child->href == 'inicio'){
				$class = $child->href == $uri ? 'first current' : 'first';	
			}
			else{
				$class = $child->href == $uri ? 'current' : '';	
			}
			
			$li_id = isset($child->li_id) ? $child->li_id : '';
			$title = ucfirst($child->title);
			$href = base_url().$child->href;
		
			$response .= 
				"<li class=\"".$class."\">
					<a href=\"".$href."\" title=\"".$title."\" id=\"".$li_id."\"><span>".$title."</span></a>".$submenu."
				</li>
				";	
		}		
		return $response;
	}

	public function stringtoTime($string = "")
	{		
		$response = $hrs = $min = "";
		if(strpos($string, "hrs")){
			if(strpos($string, "min")){
				preg_match_all('/(.*)hrs/siU', $string, $hrs);
				preg_match_all('/hrs(.*)min/siU', $string, $min);
				$response = ((int)$hrs[1][0]*60) + ((int)$min[1][0]);
			}else{
				preg_match_all('/(.*)hrs/siU', $string, $hrs);	
				$response = (int) $hrs[1][0] *60;
			}
		}
		else if(strpos($string, "min")){
			preg_match_all('/(.*)min/siU', $string, $min);
			$response = (int) $min[1][0];
		}
		return $response;	
	}

}