<?php

    $sql = array();

    $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'advancedmagicsearch`;';

    $sql[] = 'DROP TABLE IF EXISTS `' . _DB_PREFIX_ . 'answers_link`;';

    foreach ($sql as $query) {
        if (Db::getInstance()->execute($query) == false) {
            return false;
        }
    }
?>
