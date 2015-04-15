<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Misce {

    public function stringtoTime($string = ""){
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

/* End of file Someclass.php */