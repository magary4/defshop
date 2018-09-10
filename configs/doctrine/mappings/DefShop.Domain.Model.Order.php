<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

/** @var \Doctrine\Orm\Mapping\ClassMetadata $metadata */
$metadata->setPrimaryTable([
    'name' => 'orders'
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
    'fieldName' => 'userId',
    'columnName' => 'user_id',
    'type' => 'integer',
    'nullable' => false
]);

$metadata->mapField([
    'fieldName' => 'paymentMethod',
    'columnName' => 'payment_method',
    'type' => 'string',
    'nullable' => false
]);

$metadata->mapField([
    'fieldName' => 'time',
    'columnName' => 'time',
    'type' => 'datetime',
    'nullable' => false
]);

$metadata->mapOneToMany([
    'fieldName'      => 'items',
    'targetEntity'   => \DefShop\Domain\Model\OrderItem::class,
    'cascade'        => ['persist','merge'],
    'mappedBy'       => "order_id"
]);