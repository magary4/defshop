<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

/** @var \Doctrine\Orm\Mapping\ClassMetadata $metadata */
$metadata->setPrimaryTable([
    'name' => 'taxes'
]);

$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);

$metadata->mapField([
    'id' => true,
    'fieldName' => 'id',
    'columnName' => 'id',
    'type' => 'integer',
    'nullable' => false,
    'unique' => true,
    'primary' => true
]);

$metadata->mapField([
    'fieldName' => 'name',
    'columnName' => 'name',
    'type' => 'string',
    'unique' => true,
    'nullable' => false
]);

$metadata->mapField([
    'fieldName' => 'tax',
    'columnName' => 'tax',
    'type' => 'float',
    'nullable' => false
]);

//$metadata->mapOneToMany([
//    'fieldName'      => 'tax_id',
//    'targetEntity'   => \DefShop\Domain\Model\Product::class,
//    'cascade'        => ['persist','merge'],
//    'mappedBy'       => 'tax_id'
//]);