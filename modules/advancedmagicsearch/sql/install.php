<?php

    $sql = array();

    $sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'advancedmagicsearch` (
        `id_advancedmagicsearch` int(11) NOT NULL AUTO_INCREMENT,
        `id_customer` int(11) NOT NULL AUTO_INCREMENT,
        `id_domanda` int(4) NOT NULL,
        `id_risposta` int(4) NOT NULL,
        PRIMARY KEY  (`id_advancedmagicsearch`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

    $sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'answers_link` (
        `id_row` int(11) NOT NULL AUTO_INCREMENT,
        `id_answer` int(4) NOT NULL,
        `type` char(10) NOT NULL,
        `id_primario` int(10) NOT NULL,
        `id_valore` int(10) NOT NULL,
        PRIMARY KEY  (`id_row`)
    ) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

    foreach ($sql as $query) {
        if (Db::getInstance()->execute($query) == false) {
            return false;
        }
    }

?>
