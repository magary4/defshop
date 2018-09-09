<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

/** @var \Doctrine\Orm\Mapping\ClassMetadata $metadata */
$metadata->setPrimaryTable([
    'name' => 'users'
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
    'fieldName' => 'email',
    'columnName' => 'email',
    'type' => 'string',
    'unique' => true,
    'nullable' => false
]);

$metadata->mapField([
    'fieldName' => 'name',
    'columnName' => 'name',
    'type' => 'string',
    'nullable' => false
]);

$metadata->mapField([
    'fieldName' => 'passwordHash',
    'columnName' => 'password_hash',
    'type' => 'string',
    'nullable' => false
]);