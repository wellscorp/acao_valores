<?php
/**
 * Created by PhpStorm.
 * User: Welton
 * Date: 12/03/2015
 * Time: 12:07
 */

namespace Base\Validacao;


class SerializableContainer {
    protected $subject;
    protected $serialized;
    protected $class_paths = array();

    function __construct($subject) {
        $this->subject = $subject;
    }

    function getSubject() {
        if($this->serialized) {
            $this->_includeFiles();

            $this->subject = unserialize($this->serialized);
            unset($this->serialized);
        }
        return $this->subject;
    }

    function __sleep() {
        $this->serialized = serialize($this->subject);
        $this->_fillClassPathInfo($this->serialized);

        return array('serialized', 'class_paths');
    }

    function _includeFiles() {
        foreach($this->class_paths as $path)
            require_once($path);
    }

    function _fillClassPathInfo($serialized) {
        $classes = $this->_extractSerializedClasses($serialized);
        $this->class_paths = array();

        foreach($classes as $class) {
            $reflect = new \ReflectionClass($class);
            $this->class_paths[] = $reflect->getFileName();
        }
    }

    function _extractSerializedClasses($str) {
        if(preg_match_all('~(\||;)O:\d+:"([^"]+)":\d+:\{~', $str, $m))
            return array_unique($m[2]);
        else
            return array();
    }
} 