<?php

// labs home page route
$route = new Zend_Controller_Router_Route(
        '/', array(
            'controller' => 'ticket',
            'action' => 'index'
        )
);
$router->addRoute('/', $route);

// Add labs route
$route = new Zend_Controller_Router_Route(
        'ticket/create', array(
            'controller' => 'ticket',
            'action' => 'save'
        )
);
$router->addRoute('labs/create', $route);

// Edit labs route
$route = new Zend_Controller_Router_Route(
        'ticket/edit/:id', array(
            'controller' => 'ticket',
            'action' => 'edit'
        ), array('id' => '\d+')
);
$router->addRoute('labs/edit/:id', $route);

// Delete labs route
$route = new Zend_Controller_Router_Route(
        'ticket/delete/:id', array(
            'controller' => 'ticket',
            'action' => 'delete'
        ), array('id' => '\d+')
);
$router->addRoute('labs/delete/:id', $route);



// labs home page route
$route = new Zend_Controller_Router_Route(
    'ticket/cvsexport', array(
        'controller' => 'ticket',
        'action' => 'cvsexport'
    )
);
$router->addRoute('labs/cvsexport', $route);