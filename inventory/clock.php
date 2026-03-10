<?php
/*
 Student Name: Hitarth Patel
 Date: March 10, 2026
 Course: IT202 Section 002
 Assignment: Phase 3 - HTML Website Layout
 Email: hp627@njit.edu
*/
require_once(__DIR__ . '/database.php');

class Clock
{
    public $clock_id;
    public $clock_code;
    public $clock_name;
    public $clock_description;
    public $clock_style;
    public $clock_power_source;
    public $clock_type_id;
    public $clock_buy_price;
    public $clock_sell_price;
    public $date_time_created;
    public $date_time_updated;

    function __construct(
        $clock_id,
        $clock_code,
        $clock_name,
        $clock_description,
        $clock_style,
        $clock_power_source,
        $clock_type_id,
        $clock_buy_price,
        $clock_sell_price,
        $date_time_created = null,
        $date_time_updated = null
    ) {
        $this->clock_id = $clock_id;
        $this->clock_code = $clock_code;
        $this->clock_name = $clock_name;
        $this->clock_description = $clock_description;
        $this->clock_style = $clock_style;
        $this->clock_power_source = $clock_power_source;
        $this->clock_type_id = $clock_type_id;
        $this->clock_buy_price = $clock_buy_price;
        $this->clock_sell_price = $clock_sell_price;
        $this->date_time_created = $date_time_created;
        $this->date_time_updated = $date_time_updated;
    }

    static function findClock($clock_id)
    {
        $db = getDB();
        if (!$db) {
            return null;
        }

        $query = 'SELECT clock_id, clock_code, clock_name, clock_description, clock_style, clock_power_source, clock_type_id,
                         clock_buy_price, clock_sell_price, date_time_created, date_time_updated
                  FROM clocks
                  WHERE clock_id = ?';
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $clock_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $db->close();

        if (!$row) {
            return null;
        }

        return new Clock(
            $row['clock_id'],
            $row['clock_code'],
            $row['clock_name'],
            $row['clock_description'],
            $row['clock_style'],
            $row['clock_power_source'],
            $row['clock_type_id'],
            $row['clock_buy_price'],
            $row['clock_sell_price'],
            $row['date_time_created'],
            $row['date_time_updated']
        );
    }

    function saveClock()
    {
        $db = getDB();
        if (!$db) {
            return false;
        }

        $query = 'INSERT INTO clocks (
                    clock_id, clock_code, clock_name, clock_description, clock_style, clock_power_source,
                    clock_type_id, clock_buy_price, clock_sell_price
                  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            'isssssidd',
            $this->clock_id,
            $this->clock_code,
            $this->clock_name,
            $this->clock_description,
            $this->clock_style,
            $this->clock_power_source,
            $this->clock_type_id,
            $this->clock_buy_price,
            $this->clock_sell_price
        );
        $result = $stmt->execute();
        $stmt->close();
        $db->close();
        return $result;
    }

    static function getClocks()
    {
        $db = getDB();
        if (!$db) {
            return null;
        }

        $query = 'SELECT clock_id, clock_code, clock_name, clock_description, clock_style, clock_power_source, clock_type_id,
                         clock_buy_price, clock_sell_price, date_time_created, date_time_updated
                  FROM clocks
                  ORDER BY clock_id';
        $result = $db->query($query);

        if (!$result || mysqli_num_rows($result) === 0) {
            $db->close();
            return null;
        }

        $clocks = array();
        while ($row = $result->fetch_assoc()) {
            $clocks[] = new Clock(
                $row['clock_id'],
                $row['clock_code'],
                $row['clock_name'],
                $row['clock_description'],
                $row['clock_style'],
                $row['clock_power_source'],
                $row['clock_type_id'],
                $row['clock_buy_price'],
                $row['clock_sell_price'],
                $row['date_time_created'],
                $row['date_time_updated']
            );
        }

        $db->close();
        return $clocks;
    }

    static function getClocksByType($clock_type_id)
    {
        $db = getDB();
        if (!$db) {
            return null;
        }

        $query = 'SELECT clock_id, clock_code, clock_name, clock_description, clock_style, clock_power_source, clock_type_id,
                         clock_buy_price, clock_sell_price, date_time_created, date_time_updated
                  FROM clocks
                  WHERE clock_type_id = ?
                  ORDER BY clock_id';
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $clock_type_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result || mysqli_num_rows($result) === 0) {
            $stmt->close();
            $db->close();
            return null;
        }

        $clocks = array();
        while ($row = $result->fetch_assoc()) {
            $clocks[] = new Clock(
                $row['clock_id'],
                $row['clock_code'],
                $row['clock_name'],
                $row['clock_description'],
                $row['clock_style'],
                $row['clock_power_source'],
                $row['clock_type_id'],
                $row['clock_buy_price'],
                $row['clock_sell_price'],
                $row['date_time_created'],
                $row['date_time_updated']
            );
        }

        $stmt->close();
        $db->close();
        return $clocks;
    }

    function updateClock()
    {
        $db = getDB();
        if (!$db) {
            return false;
        }

        $query = 'UPDATE clocks
                  SET clock_code = ?, clock_name = ?, clock_description = ?, clock_style = ?, clock_power_source = ?,
                      clock_type_id = ?, clock_buy_price = ?, clock_sell_price = ?
                  WHERE clock_id = ?';
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            'sssssiddi',
            $this->clock_code,
            $this->clock_name,
            $this->clock_description,
            $this->clock_style,
            $this->clock_power_source,
            $this->clock_type_id,
            $this->clock_buy_price,
            $this->clock_sell_price,
            $this->clock_id
        );
        $result = $stmt->execute();
        $stmt->close();
        $db->close();
        return $result;
    }

    function removeClock()
    {
        $db = getDB();
        if (!$db) {
            return false;
        }

        $query = 'DELETE FROM clocks WHERE clock_id = ?';
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $this->clock_id);
        $result = $stmt->execute();
        $stmt->close();
        $db->close();
        return $result;
    }
}
?>
