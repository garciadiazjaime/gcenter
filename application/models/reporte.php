<?php

class Reporte extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('path');
        $this->load->library('miscellaneous');
    }
    
    function test()
    {
        echo "test";        
    }

    function get_ads($type=1)
    {
        $response = '';
        $ads_id = 0;
        $counter = 0;
        $ads = '';
        $sql = "SELECT id, ads, counter_print
            FROM publicidad 
            WHERE type = ".$type."  
                AND status=1
            ORDER BY last_print_date
            LIMIT 1
            ";
        $query = $this->db->query($sql);   
        if($query->num_rows() > 0)
        {
            $ads_id =$query->row()->id;
            $response = $query->row()->ads;
            $counter = $query->row()->counter_print + 1;
            $data = array(
               'last_print_date' => date('Y-m-d H:i:s'),
               'counter_print' => $counter
            );
            $this->db->where('id', $ads_id);
            $this->db->update('publicidad', $data); 
        }
           
        return $response;
    }

    function update_click($id)
    {
        $sql = "SELECT id, counter_click
            FROM publicidad 
            WHERE id = ".$id;
        $query = $this->db->query($sql);   
        if($query->num_rows() > 0)
        {
            $ads_id =$query->row()->id;
            $counter = $query->row()->counter_click + 1;
            $data = array(
               'last_print_date' => date('Y-m-d H:i:s'),
               'counter_click' => $counter
            );
            $this->db->where('id', $ads_id);
            $this->db->update('publicidad', $data);    
        }
    }
    
    function get_data_from($flag)
    {
	$garitaInfo = array();
        $operational_status = '';
	//-------------------------SAN YSIDRO	
        if($flag == 1){
            $xml = simplexml_load_file("http://apps.cbp.gov/bwt/bwt.xml");
    		foreach($xml->children() as $child)
    		{
    			if($child->port_number == 250401)
                	{
    				$garitaInfo['garita']['carros']['puertas'] = $child->passenger_vehicle_lanes->standard_lanes->lanes_open;
				$garitaInfo['garita']['carros']['tiempo'] = $child->passenger_vehicle_lanes->standard_lanes->delay_minutes;
    				$garitaInfo['garita']['sentri']['puertas'] = $child->passenger_vehicle_lanes->NEXUS_SENTRI_lanes->lanes_open;
    				$garitaInfo['garita']['sentri']['tiempo'] = $child->passenger_vehicle_lanes->NEXUS_SENTRI_lanes->delay_minutes;
    				$garitaInfo['garita']['ready']['puertas'] = $child->passenger_vehicle_lanes->ready_lanes->lanes_open;
    				$garitaInfo['garita']['ready']['tiempo'] = $child->passenger_vehicle_lanes->ready_lanes->delay_minutes;
    				$garitaInfo['garita']['personas']['puertas'] = $child->pedestrian_lanes->standard_lanes->lanes_open;
    				$garitaInfo['garita']['personas']['tiempo'] = $child->pedestrian_lanes->standard_lanes->delay_minutes;
    			}
    	  	}
        }
        //-------------------------OTAY
        elseif ( $flag == 2) {
            $xml = simplexml_load_file("http://apps.cbp.gov/bwt/bwt.xml");
            foreach($xml->children() as $child)
            {
                if($child->port_number == 250601)
                {
                    $garitaInfo['garita']['carros']['puertas']     = $child->passenger_vehicle_lanes->standard_lanes->lanes_open;
                    $garitaInfo['garita']['carros']['tiempo']      = $child->passenger_vehicle_lanes->standard_lanes->delay_minutes;
                    $garitaInfo['garita']['sentri']['puertas']     = $child->passenger_vehicle_lanes->NEXUS_SENTRI_lanes->lanes_open;
                    $garitaInfo['garita']['sentri']['tiempo']      = $child->passenger_vehicle_lanes->NEXUS_SENTRI_lanes->delay_minutes;
                    $garitaInfo['garita']['ready']['puertas']      = $child->passenger_vehicle_lanes->ready_lanes->lanes_open;
                    $garitaInfo['garita']['ready']['tiempo']       = $child->passenger_vehicle_lanes->ready_lanes->delay_minutes;
                    $garitaInfo['garita']['personas']['puertas']   = $child->pedestrian_lanes->standard_lanes->lanes_open;
                    $garitaInfo['garita']['personas']['tiempo']    = $child->pedestrian_lanes->standard_lanes->delay_minutes;
                }
            }
        } 
        if(empty($garitaInfo)) $garitaInfo = FALSE;
        return $garitaInfo;
    }

    function save_data($flag, $data)
    {
        date_default_timezone_set('America/Los_Angeles');
        $response = FALSE;
        $datetime = date('Y-m-d H:i:s');
        $sql = "insert into reporte(garita_idgarita, fecha_hora) values(".$flag.",'".$datetime."')";
        $query = $this->db->query($sql);
        $reporte_id = $this->db->insert_id();
        $sql = "
                INSERT INTO reporte_historial(
                    numero, 
                    reporte_idreporte, 
                    garita_tipo_id, 
                    garita_dimension_id) 
                VALUES 
                    (".(int)$data['garita']['carros']['puertas'].",
                        ".$reporte_id.",
                        1,
                        1),
                    (".(int)$data['garita']['carros']['tiempo'].",
                        ".$reporte_id.",
                        1,
                        2),
                    (".(int)$data['garita']['sentri']['puertas'].",
                        ".$reporte_id.",
                        2,
                        1),                     
                    (".(int)$data['garita']['sentri']['tiempo'].",
                        ".$reporte_id.",
                        2,
                        2),                         
                    (".(int)$data['garita']['ready']['puertas'].",
                        ".$reporte_id.",
                        3,
                        1),                     
                    (".(int)$data['garita']['ready']['tiempo'].",
                        ".$reporte_id.",
                        3,
                        2),                     
                    (".(int)$data['garita']['personas']['puertas'].",
                        ".$reporte_id.",
                        4,
                        1),                     
                    (".(int)$data['garita']['personas']['tiempo'].",
                        ".$reporte_id.",
                        4,
                        2)
        ";
        if($this->db->query($sql))
                $response = TRUE;
        return $response;
    }

    function get_reporte($garita)
    {
        $response = "";
        $reporte_id = "";
        
        $sql = "select max(idreporte) as idreporte from reporte where garita_idgarita=".$garita;
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
        {
            $reporte_id = $query->row()->idreporte;                
            $response = $this->get_data_reporte($reporte_id);
            //$response .= $this->printImg(1);                        
        }            
        return $response;        
    }   

    function get_data_reporte($reporte_id)
    {        
        $response = '';
        $sql = "
            select 
                rh.numero,
                gd.nombre as dimension, 
                gt.nombre as tipo
            from reporte r
            inner join reporte_historial rh
                on r.idreporte=rh.reporte_idreporte
            inner join garita_dimension gd
                on rh.garita_dimension_id = gd.id
            inner join garita_tipo gt
                on rh.garita_tipo_id = gt.id
            where r.idreporte= ".$reporte_id;
        $query = $this->db->query($sql);
        if($query->num_rows > 0)
        {            
            foreach ($query->result() as $key => $value) {                                     
                if($value->dimension == 'tiempo') 
                    $response[$value->dimension][$value->tipo] = $this->convertToHoursMins($value->numero);                
                else
                    $response[$value->dimension][$value->tipo] = $value->numero;
            }            
        }        
        return $response;
    }

    function convertToHoursMins($time, $format = '%d:%02d') {
        settype($time, 'integer');
        if ($time < 1) {
            return '0:00';
        }
        $hours = floor($time/60);
        $minutes = $time%60;
        return sprintf($format, $hours, $minutes);
    }

    function printImg($garita)
    {
        $response = "";
        if($garita == 1)
        {
            $response = "<a href=\"".base_url()."resources/images/garita/san-ysidro.jpg\" class=\"img-garita\" id=\"garita-sanYsidro\" title=\"Imagen de la Garita de Tijuana-San Ysidro\">VER IMAGEN</a>
                        <span class=\"credits\">Extraida de <b>telnor.com</b></span>
                        <hr />
                        ";
        }
        elseif($garita == 2)
        {
            $response = "<a href=\"".base_url()."resources/images/garita/otay.jpg\" class=\"img-garita\" id=\"garita-sanYsidro\" title=\"Imagen de la Garita de Tijuana-Otay\">VER IMAGEN</a>
                        <span class=\"credits\">Extraida de <b>telnor.com</b></span>
                        <hr />
                        ";
        }
        return $response;
    }

    function save_img($garita)
    {
        $response = TRUE;
        if($garita == 1)
        {
            $xml = simplexml_load_file("http://www.telnor.com/wstno/garitas2011/garitas_prod.xml");
            foreach($xml->children() as $child){
                $xmlGarita[] = $child;
            }
            $garita = $xmlGarita[0]->children();
            $result = $garita->children();
            if (!copy("http://telnor.com".$result[0], BASEPATH."../resources/images/garita/san-ysidro.jpg")) {
                $response = FALSE;
            }   
        }
        else if($garita == 2)
        {
            $xml = simplexml_load_file("http://www.telnor.com/wstno/garitas2011/garitas_prod.xml");
            foreach($xml->children() as $child){
                $xmlGarita[] = $child;
            }
            $garita = $xmlGarita[1]->children();
            $result = $garita->children();
            if (!copy("http://telnor.com".$result[0], BASEPATH."../resources/images/garita/otay.jpg")) {
                $response = FALSE;
            }                
        }
        return $response;
    }

    function last_update($garita)
    {
        $response = "";
        $sql = "
            SELECT UNIX_TIMESTAMP(fecha_hora) as fecha_hora
            FROM reporte 
            WHERE garita_idgarita = ".$garita." 
            ORDER BY fecha_hora DESC            
            LIMIT 1
        ";
        $query = $this->db->query($sql);
        if($query->num_rows > 0)
            $response = $this->ago($query->row()->fecha_hora);
        return $response;
    }

    public function ago($time)
    {
        $periods = array("segundo", "minuto", "hora", "d&iacute;a", "semana", "mes", "a&ntilde;o", "d&eacute;cada");
        $lengths = array("60","60","24","7","4.35","12","10");
        $now = time();
        $difference     = $now - $time - 7200;
        $tense         = "ago";
        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }
        $difference = round($difference);
        if($difference != 1) {
            $periods[$j] .= ($periods[$j] == 'mes') ? 'es' : "s";
        }
        return "hace $difference $periods[$j]";
    }
    
    function getServiceReporte()
    {
		$garitas = array(1, 2);
		$response = "";
		$i = 0;
		foreach($garitas as $row)
		{
			$sql = "SELECT max(idreporte) as id, fecha_hora FROM reporte WHERE garita_idgarita=".$row;	
            $query = $this->db->query($sql);
            if($query->num_rows() > 0)
            {
            	$id = $query->row()->id;
            	$response[$i]['garita'] = $row;
            	$response[$i]['data'] = $this->getServiceData($id);
            	$i++;
            }
		}
		echo json_encode($response);
    }
    
    function getServiceData($id)
    {
    	$response = "";
    	$i = 0;
        $sql = "
            select 
                rh.numero, 
                gd.id as dimension, 
                gt.id as tipo
            from reporte r
            inner join reporte_historial rh
                on r.idreporte=rh.reporte_idreporte
            inner join garita_dimension gd
                on rh.garita_dimension_id = gd.id
            inner join garita_tipo gt
                on rh.garita_tipo_id = gt.id
            where r.idreporte= ".$id;
        $query = $this->db->query($sql);
        if($query->num_rows > 0)
        {
           foreach($query->result() as $row)
           {
           		$response[$i]['numero'] = $row->numero;
           		$response[$i]['dimension'] = $row->dimension;
           		$response[$i]['tipo'] = $row->tipo;
           		$i++;
           }
        }
        return $response;
    }        
}
?>
