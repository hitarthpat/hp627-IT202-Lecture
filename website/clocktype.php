<?php
/*
 Student Name: Hitarth Patel
 Date: April 17, 2026
 Course: IT202 Section 002
 Assignment: Phase 5 - JavaScript and AJAX
 Email: hp627@njit.edu
*/
require_once(__DIR__ . '/database.php');

class ClockType
{
    public $clock_type_id;
    public $clock_type_code;
    public $clock_type_name;
    public $clock_aisle_number;
    public $date_time_created;
    public $date_time_updated;

    function __construct(
        $clock_type_id,
        $clock_type_code,
        $clock_type_name,
        $clock_aisle_number,
        $date_time_created = null,
        $date_time_updated = null
    ) {
        $this->clock_type_id = $clock_type_id;
        $this->clock_type_code = $clock_type_code;
        $this->clock_type_name = $clock_type_name;
        $this->clock_aisle_number = $clock_aisle_number;
        $this->date_time_created = $date_time_created;
        $this->date_time_updated = $date_time_updated;
    }

    static function findClockType($clock_type_id)
    {
        $db = getDB();
        if (!$db) {
            return null;
        }

        $query = 'SELECT clock_type_id, clock_type_code, clock_type_name, clock_aisle_number, date_time_created, date_time_updated
                  FROM clock_types
                  WHERE clock_type_id = ?';
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $clock_type_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $db->close();

        if (!$row) {
            return null;
        }

        return new ClockType(
            $row['clock_type_id'],
            $row['clock_type_code'],
            $row['clock_type_name'],
            $row['clock_aisle_number'],
            $row['date_time_created'],
            $row['date_time_updated']
        );
    }

    function saveClockType()
    {
        $db = getDB();
        if (!$db) {
            return false;
        }

        $query = 'INSERT INTO clock_types (clock_type_id, clock_type_code, clock_type_name, clock_aisle_number)
                  VALUES (?, ?, ?, ?)';
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            'isss',
            $this->clock_type_id,
            $this->clock_type_code,
            $this->clock_type_name,
            $this->clock_aisle_number
        );
        $result = $stmt->execute();
        $stmt->close();
        $db->close();
        return $result;
    }

    static function getClockTypes()
    {
        $db = getDB();
        if (!$db) {
            return null;
        }

        $query = 'SELECT clock_type_id, clock_type_code, clock_type_name, clock_aisle_number, date_time_created, date_time_updated
                  FROM clock_types
                  ORDER BY clock_type_id';
        $result = $db->query($query);

        if (!$result || mysqli_num_rows($result) === 0) {
            $db->close();
            return null;
        }

        $clockTypes = array();
        while ($row = $result->fetch_assoc()) {
            $clockTypes[] = new ClockType(
                $row['clock_type_id'],
                $row['clock_type_code'],
                $row['clock_type_name'],
                $row['clock_aisle_number'],
                $row['date_time_created'],
                $row['date_time_updated']
            );
        }

        $db->close();
        return $clockTypes;
    }

    static function countClockTypes()
    {
        $db = getDB();
        if (!$db) {
            return 0;
        }

        $query = 'SELECT COUNT(*) AS total_clock_types FROM clock_types';
        $result = $db->query($query);
        $row = $result ? $result->fetch_assoc() : null;
        $db->close();

        return $row ? (int)$row['total_clock_types'] : 0;
    }

    function updateClockType()
    {
        $db = getDB();
        if (!$db) {
            return false;
        }

        $query = 'UPDATE clock_types
                  SET clock_type_code = ?, clock_type_name = ?, clock_aisle_number = ?
                  WHERE clock_type_id = ?';
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            'sssi',
            $this->clock_type_code,
            $this->clock_type_name,
            $this->clock_aisle_number,
            $this->clock_type_id
        );
        $result = $stmt->execute();
        $stmt->close();
        $db->close();
        return $result;
    }

    function removeClockType()
    {
        $db = getDB();
        if (!$db) {
            return false;
        }

        $query = 'DELETE FROM clock_types WHERE clock_type_id = ?';
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $this->clock_type_id);
        $result = $stmt->execute();
        $stmt->close();
        $db->close();
        return $result;
    }

    function hasAssignedClocks()
    {
        $db = getDB();
        if (!$db) {
            return false;
        }

        $query = 'SELECT COUNT(*) AS total_clocks
                  FROM clocks
                  WHERE clock_type_id = ?';
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $this->clock_type_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        $db->close();

        return $row && (int)$row['total_clocks'] > 0;
    }
}
?>
