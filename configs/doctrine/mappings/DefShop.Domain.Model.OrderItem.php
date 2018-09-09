<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

/** @var \Doctrine\Orm\Mapping\ClassMetadata $metadata */
$metadata->setPrimaryTable([
    'name' => 'order_items'
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
    'fieldName' => 'productId',
    'columnName' => 'product_id',
    'type' => 'integer',
    'nullable' => false
]);

$metadata->mapField([
    'fieldName' => 'price',
    'columnName' => 'price',
    'type' => 'integer',
    'nullable' => false
]);

$metadata->mapManyToOne([
    'fieldName'      => 'order',
    'targetEntity'   => \DefShop\Domain\Model\Order::class,
    'cascade'        => ['persist','merge'],
    'joinColumn'     => ['name'=>'order_id', 'referencedColumnMame'=>'id'],
]);