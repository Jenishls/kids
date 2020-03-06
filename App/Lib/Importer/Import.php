<?php
/**
 * THIS INTELLECTUAL PROPERTY IS COPYRIGHT Ⓒ 2020
 * SYSTHA TECH LLC. ALL RIGHT RESERVED
 */
namespace App\Lib\Importer;


class Import
{
    protected $model;

    public function __construct(Importable $importer)
    {
        $this->model = $importer;
    }

    public function import()
    {
        $this->model->import();
    }
}