<?php

class DatabaseObject
{
    static protected $database;
    static protected $table_name = "";
    static protected $db_columns = [];
    public $errors = [];


    static public function set_database($database)
    {
        self::$database = $database;
    }

    static public function find_by_sql($sql)
    {

        $result = self::$database->query($sql);
        if (!$result) {
            exit("Database query failed due to the following error " . self::$database->error);
        }

        // results into objects
        $object_array = [];
        while ($record = $result->fetch_assoc()) {
            $object_array[] = static::instantiate($record);
        }

        $result->free();

        return $object_array;
    }

    static public function find_all()
    {
        $sql = "SELECT * FROM " . static::$table_name;
        return static::find_by_sql($sql);
    }

    // Find a single record ( Bicycle ) by id
    static public function find_by_id($id)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= " WHERE id = '" . self::$database->escape_string($id) . "'";
        $object_array = static::find_by_sql($sql);
        if (!empty($object_array)) {
            return array_shift($object_array);
        } else {
            return false;
        }
    }

    static protected function instantiate($record)
    {
        $object = new static();
        // Could manually assign values to properties
        // but automatic assignment is easier and re-usable

        foreach ($record as $property => $value) {
            if (property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

    // Validate fields
    protected function validate()
    {
        $this->errors = [];

        return $this->errors;
    }

    // Insert bicycle into database
    protected function create()
    {
        $this->validate();
        if (!empty($this->errors)) {
            return false;
        }
        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(',', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "') ";
        $result = self::$database->query($sql);
        if ($result) {
            $this->id = self::$database->insert_id;
        }
        return $result;
    }


    // Update bicycle record
    protected function update()
    {
        $this->validate();
        if (!empty($this->errors)) {
            return false;
        }
        $attributes = $this->sanitized_attributes();
        $attributes_pair = [];
        foreach ($attributes as $key => $value) {
            $attributes_pair[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attributes_pair);
        $sql .= " WHERE id='" . self::$database->escape_string($this->id) . "'";
        $sql .= " LIMIT 1";
        $result = self::$database->query($sql);
        return $result;

    }

    public function save()
    {
        // New record doesn't have id
        if (isset($this->id) && $this->id != '') {
            return $this->update();
        } else {
            return $this->create();
        }
    }

    // Delete bicycle record from database
    public function delete()
    {
        $sql = "DELETE FROM " . static::$table_name . " ";
        $sql .= "WHERE id = '" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;

        // After deleting, the instance of the object will still
        // exist, even though the database record does not.
        // This can be useful, as in:
        //   echo $user->first_name . " was deleted.";
        // but, for example, we can't call $user->update() after
        // calling $user->delete().
    }

    // Properties which have database columns, excluding id
    public function attributes()
    {
        $attributes = [];
        foreach (static::$db_columns as $column) {
            if ($column == 'id') {
                continue;
            }
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }


    // Sanitized properties have database columns, excluding id
    protected function sanitized_attributes()
    {
        $sanitized_attributes = [];
        foreach ($this->attributes() as $key => $value) {
            $sanitized_attributes[$key] = self::$database->escape_string($value);
        }
        return $sanitized_attributes;
    }

}

?>