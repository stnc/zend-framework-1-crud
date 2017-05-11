<?php

class Application_Model_Ticket
{

    protected $_id;
    protected $_title;
    protected $_notes;
    protected $_created_at;
    protected $_updated_at;
    protected $_files;
    protected $_priority;

    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid guestbook property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid guestbook property');
        }
        return $this->$method();
    }

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function setId($id)
    {
        $this->_id = (int)$id;
        return $this;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setTitle($title)
    {
        $this->_title = (string)$title;
        return $this;
    }

    public function getTitle()
    {
        return $this->_title;
    }

    public function setNotes($notes)
    {
        $this->_notes = (string)$notes;
        return $this;
    }

    public function getNotes()
    {
        return $this->_notes;
    }

    public function setCreatedat($ts)
    {
        $this->_created_at = $ts;
        return $this;
    }

    public function getCreatedat()
    {
        return $this->_created_at;
    }

    public function setUpdatedat($ts)
    {
        $this->_updated_at = $ts;
        return $this;
    }

    public function getUpdatedat()
    {
        return $this->_updated_at;
    }


    public function setFiles($files)
    {
        $this->_files = (string)$files;
        return $this;
    }

    public function getFiles()
    {
        return $this->_files;

    }

    public function setPriority($priority)
    {
        $this->_priority = (string)$priority;
        return $this;
    }

    public function getPriority()
    {
        return $this->_priority;

    }
}
