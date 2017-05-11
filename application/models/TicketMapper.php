<?php

class Application_Model_TicketMapper
{
    protected $_dbTable;

    /**
     * Set DbTable.
     * @param type $dbTable
     * @return \Application_Model_TicketMapper
     * @throws Exception
     */
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }

    /**
     * Get DbTable.
     * @return type
     */
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_TicketDbTable');
        }
        return $this->_dbTable;
    }

    /**
     * Save tickets
     * @param Application_Model_Ticket $ticket
     */
    public function saveTopic(Application_Model_Ticket $ticket)
    {

        $data = array(
            'title' => $ticket->getTitle(),
            'notes' => $ticket->getNotes(),
            'created_at' => date('Y-m-d H:i:s'),
            'files' => $ticket->getFiles(),
            'priority' => $ticket->getPriority(),
        );

        if (null == ($id = $ticket->getId())) {
            unset($data['id']);
            return $this->getDbTable()->insert($data);
        } else {
            return $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }

    /**
     * Fetch individual cvs
     * @param type $id
     * @param Application_Model_Blog $ticket
     * @return type
     */
    public function findTopic($id, Application_Model_Ticket $ticket)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $ticket->setId($row->id)
            ->setTitle($row->title)
            ->setNotes($row->notes)
            ->setCreatedat($row->created_at)
            ->setUpdatedat($row->updated_at);

        return $row;

    }

    /**
     * Fetch all tickets cvs
     * @return \Application_Model_Blog
     */
    public function fetchAllCvs()
    {
        $select = $this->getDbTable()->select();
        $select->order('id DESC');

        $resultSet = $this->getDbTable()->fetchAll($select);


        $entries = array();
        foreach ($resultSet as $key=> $row) {
            $entries[$key]['ID'] = $row->id;
            $entries[$key]['TITLE'] = $row->title;
            $entries[$key]['NOTES'] = $row->notes;
        }
        return $entries;
    }

    /**
     * Fetch all lab topics.
     * @return \Application_Model_Blog
     */
    public  function fetchAllTopics()
    {

        ////http://stackoverflow.com/questions/23018589/how-to-do-a-zend-dbtable-fetchall-in-descending-order
        //sort olayi
        $select = $this->getDbTable()->select();
        $select->order('id DESC');

        $resultSet = $this->getDbTable()->fetchAll($select);


        $entries = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Ticket();
            $entry->setId($row->id)
                ->setTitle($row->title)
                ->setNotes($row->notes)
                ->setCreatedat($row->created_at)
                ->setUpdatedat($row->updated_at);
            $entries[] = $entry;
        }

        return $entries;
    }

    /**
     * Delete lab topic.
     * @param type $id
     * @return type
     */
    public
    function deleteTopic($id)
    {
        return $this->getDbTable()->delete("id = $id");
    }


}

