<?php
/**
 * THIS INTELLECTUAL PROPERTY IS COPYRIGHT Ⓒ 2020
 * SYSTHA TECH LLC. ALL RIGHT RESERVED
 */

namespace App\Lib\Importer;


interface Importer
{
    public function convert();

    public function insertintoDB($table);
}