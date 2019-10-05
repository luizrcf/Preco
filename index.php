<?php

class Preco {
	function getPrecos($string){
		$precoSemEscala = getPreco($string, 'sem escalas R$');
		$precoComEscala = getPreco($string, 'com escalas R$');

		return array('precoSemEscala' => $precoSemEscala, 'precoComEscala' => $precoComEscala);
	}

	function getPreco($string, $prefixoPreco){
		$subString = substr($string , strpos($string, $prefixoPreco)+  strlen($prefixoPreco));
		$preco = substr($subString , 0, strpos($subString, '('));
		$preco = str_replace(',', '.', str_replace('.', '', $preco)); // Caso tenha casas decimais na string, ele formata para o float
		$preco = number_format($preco, 2, '.', '');
   
   		return $preco;
	}
}
?>