<?php

namespace artbyrab\phlash;

/**
 * Phlash
 *
 * A simple PHP flash message class.
 *
 * @author artbyrab
 */
class Phlash
{
    /**
     * Add
     *
     * Add a flash message which will be stored as a JSON array in the session.
     * Flash messages get a unique key when added so you can add multiple
     * flash messages with the same type, for example multiple error flash
     * messages or multiple success flash messages.
     *
     * @param string $type
     * @param string $message
     */
    public static function add(string $type, string $message)
    {
        $key = 0;

        if (isset($_SESSION['flash'])) {
            $currentMessages = count($_SESSION['flash']);
            $key = $key + $currentMessages;
        }
        
        $_SESSION['flash'][$key] = json_encode([
            "id" => $key,
            "timestamp" => time(),
            "type" => $type,
            "message" => $message
        ]);
    }

    /**
     * Get
     *
     * This will get all the current flash messages and return them as an
     * array.
     *
     * @return array|boolean The array is an array of stdClass PHP objects:
     *  [
     *      [0] => stdClass Object
     *          (
    *               [id] => 0
     *              [timestamp] => 1609671469
     *              [type] => info
     *              [message] => Please log in to continue
     *          )
     *
     *      [1] => stdClass Object
     *          (
     *              [id] => 1
     *              [timestamp] => 1609671469
     *              [type] => error
     *              [message] => There was a problem processing your request
     *          )
     *  ]
     */
    public static function get()
    {
        if (isset($_SESSION['flash'])) {
            $flashMessages = [];

            foreach ($_SESSION['flash'] as $flash) {
                $decodedFlash = json_decode($flash);
                array_push($flashMessages, $decodedFlash);
            }

            return $flashMessages;
        }

        return false;
    }

    /**
     * Clear
     *
     * This will clear all the flash messages.
     */
    public static function clear()
    {
        if (isset($_SESSION['flash'])) {
            unset($_SESSION['flash']);
        }
    }
}
