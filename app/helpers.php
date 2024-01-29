<?php

if (!function_exists('debug')) {

    /**
     * Exibe informação sobre uma variável de forma legível
     *
     * @param mixed a expressão a ser exibida
     * @param boolean saída de var_dump
     * @param boolean quando esse parâmetro for definido para true, retornará a informação, ao invés de exibi-la
     * @return string
     */
    function debug($expression, $dumpOption = false, $return = false): string
    {
        $saida = "<pre>";

        ob_start();
        if ($dumpOption) {
            var_dump($expression);
        } else {
            print_r($expression);
        }

        $saida .= ob_get_clean();
        $saida .= "</pre>";

        if ($return) {
            return print_r($saida, $return);
        } else {
            exit($saida);
        }
    }
}
