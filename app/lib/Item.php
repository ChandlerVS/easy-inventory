<?php
namespace ChandlerVS\EasyInventory;

class Item
{
    var $id;
    var $name;
    var $count;

    public function __construct($name, $initialCount = 0, $id = null)
    {
        $this->name = $name;
        $this->count = $initialCount;
        $this->id = $id;
    }

    public function save() {
        if($this->id == null) {
            App::$db->query("INSERT INTO items (name, count) VALUES ('{$this->name}', '{$this->count}')");
            $this->id = App::$db->getInsertId();
        } else {
            App::$db->update('items', [
                'name' => $this->name,
                'count' => $this->count
            ], ['id' => $this->id]);
        }
    }

    public static function getItem($id) {
        $result = App::$db->get_row("SELECT * FROM items WHERE id = $id");
        return new self($result->name, $result->count, $result->id);
    }
}