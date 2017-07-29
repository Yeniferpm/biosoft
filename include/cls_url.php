<?php
/**
 * Descripcion: Archivo de clases comunes en la aplicacion
 * Autor: Hernando Jose Peña H. (jopehi@sirys.net)
 * Fecha: 22/Ago/2009
 * Version: 1.0
 */


/**
* Class: clsUrlTools
* Clase que contiene funciones de manejo de dominio
*/
class clsUrlTools{
	/**
	 * Funcion que extrae el dominio del una url
	 *
	 * @param string $url  url a consultar el dominio
	 * @return string dominio de la url
	 */
	function getDomainUrl($url){
               if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === FALSE) {
                       return false;
               }
               $parts = parse_url($url);
               // echo "<pre>";
               // print_r($parts);
               // echo "</pre><hr>";
               unset($strDomain);
               $strDomain=$parts['scheme'].'://'.$parts['host'];
               if (isset($parts['port'])){
                       $strDomain.=":".$parts['port'];
               }
               return $strDomain;
       }
	  }
?>