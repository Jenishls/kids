<?php
/**
 * THIS INTELLECTUAL PROPERTY IS COPYRIGHT Ⓒ 2020
 * SYSTHA TECH LLC. ALL RIGHT RESERVED
 */

namespace App\Lib\Exporter;


interface Exportable
{
    public function export();

    public function getFile();
}