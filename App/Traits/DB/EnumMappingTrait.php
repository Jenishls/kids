<?php
namespace App\Traits\DB;
use Illuminate\Support\Facades\DB;

trait EnumMappingTrait{
    
    public function registerEnumWithDoctrine()
    {
        DB::getDoctrineSchemaManager()
            ->getDatabasePlatform()
            ->registerDoctrineTypeMapping('enum', 'string');
    }
}