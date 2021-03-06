<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

/*
 * disable named parameters because of fedora objects id containing ":"
 * enable named parameters for acl plugin
 */
Router::connectNamed(
    array(  'sort' => array('plugin' => 'acl','admin' => true),
            'direction' => array('plugin' => 'acl','admin' => true),
            'page' => array('plugin' => 'acl','admin' => true),
            'plugin' => array('plugin' => 'acl','admin' => true),
            'action' => array('plugin' => 'acl','admin' => true),
            'controller' => array('plugin' => 'acl','admin' => true)
    ),
    array('default' => false, 'greedy' => false)
);
Router::connect('/', array('controller' => 'XMLObjects', 'action' => 'index'));
Router::connect('/search', array('plugin' => 'search'));

Router::connect('/Configs', array('controller' => 'Configs'));
Router::connect('/configs', array('controller' => 'Configs'));
Router::connect('/configs/:action/*', array('controller' => 'Configs'));
Router::connect('/Configs/:action/*', array('controller' => 'Configs'));

Router::connect('/Users', array('controller' => 'Users'));
Router::connect('/users', array('controller' => 'Users'));
Router::connect('/users/:action/*', array('controller' => 'Users'));
Router::connect('/Users/:action/*', array('controller' => 'Users'));

Router::connect('/groups', array('controller' => 'Groups'));
Router::connect('/Groups', array('controller' => 'Groups'));
Router::connect('/groups/:action/*', array('controller' => 'Groups'));
Router::connect('/Groups/:action/*', array('controller' => 'Groups'));

Router::connect('/views', array('controller' => 'Views'));
Router::connect('/Views', array('controller' => 'Views'));
Router::connect('/views/:action/*', array('controller' => 'Views'));
Router::connect('/Views/:action/*', array('controller' => 'Views'));

Router::connect('/admin/acl',array('admin' => true,'plugin'=> 'acl','controller' => 'acos'));
Router::connect('/admin/acl/:controller',array('admin' => true,'plugin'=> 'acl'));
Router::connect('/admin/acl/:controller/:action/*', array('admin' => true,'plugin'=> 'acl'));
Router::connect('/:action/*', array('controller' => 'XMLObjects'));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/XMLObjects/admin/acl', array('plugin'=> 'Acl', 'controller' => 'Acos', 'action' => 'index', 'admin' => true));

/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes('Acl');


/**
REST
 */
#Router::mapResources('xmlobjects');
Router::mapResources('recipes');
Router::parseExtensions();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
