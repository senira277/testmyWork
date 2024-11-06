<?php

namespace models;
use core\Database;

use core\Model;

class Ingredient extends Model
    
{
    public ?string $name;
    public ?string $type;
    public ?string $measureUnit;
    public ?string $supplier;
    public ?float $defaultLevel;
    public ?float $alertLevel;
    public ?float $quantity;
    public ?string $updatedAt;
    public ?float $IngredientId;
    
    static function get_stock_levels($projection = '*')
    {
        $rows = Database::query_rows("SELECT * FROM Ingredient");
        return $rows;
    }
}

/*
static function find_one($query, $projection = '*')
{
    $table = static::table();
    $q = implode(" and ", array_map(fn ($x) => "$x=:$x", array_keys($query)));
    $row = Database::query_row("select $projection from $table where $q", $query);
    if ($row == null)
        return null;
    $x = new static();
    foreach ($row as $k => $v)
        $x->{$k} = $v;
    
        
        SELECT * FROM `Ingredient

        */