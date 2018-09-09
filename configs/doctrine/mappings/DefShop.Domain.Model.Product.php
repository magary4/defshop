<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

/** @var \Doctrine\Orm\Mapping\ClassMetadata $metadata */
$metadata->setPrimaryTable([
    'name' => 'products',
    'indexes' => [['name'=>'color_search','columns'=>['color']]]
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
    'nullable' => false
]);

$metadata->mapField([
    'fieldName' => 'color',
    'columnName' => 'color',
    'type' => 'string',
    'nullable' => false
]);

$metadata->mapField([
    'fieldName' => 'image',
    'columnName' => 'image',
    'type' => 'string',
    'nullable' => false
]);

$metadata->mapField([
    'fieldName' => 'price',
    'columnName' => 'price',
    'type' => 'integer',
    'nullable' => false
]);

$metadata->mapManyToOne([
    'fieldName'      => 'tax',
    'targetEntity'   => \DefShop\Domain\Model\Tax::class,
    'cascade'        => ['persist','merge'],
    'joinColumn'     => ['name'=>'tax_id', 'referencedColumnMame'=>'id'],
    'nullable'       => false
]);