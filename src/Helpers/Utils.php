<?php
namespace ExemploCrud\Helpers;

use Throwable;

final class Utils {
    /* Usando construtor privado e vazio bloqueamos a criação de objeto/instância */
    private function __construct() { }

    public static function dump(mixed $dados):void {
        echo "<pre>";
        var_dump($dados);
        echo "</pre>";
    }

    public static function formatarPreco( float $valor ):string {
    $precoFormatado = "R$ " .number_format($valor, 2, ",", ".");
    return $precoFormatado;
    }
}