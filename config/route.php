<?php
/**
 *
 */

use Framework\Event\Config\Events;
use Framework\Route\Definition\RouteDefinition;
use Framework\Service\Config\Call\Call;
use Framework\Service\Config\Config as ServiceConfig;
use Framework\Service\Config\ControllerAction\ControllerAction;
use Framework\Service\Config\Dependency\Dependency;
use Framework\Service\Config\Factory\Factory;
use Framework\Service\Config\Filter\Filter;
use Framework\Service\Config\Hydrator\Hydrator;
use Framework\Service\Config\Invokable\Invokable;
use Framework\Service\Config\Invoke\Invoke;
use Framework\Service\Config\Param\Param;
use Framework\Service\Config\Service\Service;
use Framework\Service\Config\ServiceConfig\ServiceConfig as ServiceConfiguration;
use Framework\Service\Config\ServiceManagerLink\ServiceManagerLink;

//demo route controller
use Framework\View\Model\Model;
use Framework\View\Manager\ViewManager;
use Request\Request;
use Response\Response;

//demo route builder
use Framework\Route\Definition\Builder\Builder;
/*var_export(Builder::definition([
    'name'       => 'default',
    'route'       => '/[:controller[/:action]]',
    'controller' => 'Home',
    'constraints' => [
        'controller' => '[a-zA-Z0-9_-]*',
        'action'     => '[a-zA-Z0-9_-]*'
    ],
    'defaults' => [
        'controller' => 'Home',
        'action'     => 'index'
    ]
]));
exit;*/

//demo route controller
function test(Request $request, Response $response, ViewManager $vm, array $args = [])
{
    $args['args'][] = __FUNCTION__;

    $m = new Model('home', $args);
    //$m->setViewManager($vm);

    return $m;
}
return [
    'home' => [
        'name'       => 'home',
        'route'      => '/',
        'controller' => 'Home'
    ],
    'application' => [
        'name'       => 'application',
        'route'      => '/application',
        'controller' => '@Home.test',
        'children' => [
            'default' => [
                'name'       => 'default',
                'route'      => '/:controller[/:action]',
                'defaults'   => [
                    'controller' => 'index',
                    'action'     => 'index'
                ],
                'wildcard'   => false,
                /*'controller' => function(Request $request, Response $response, $sm) {
                    //$response = $sm->trigger('Blog\Create');

                    //var_dump(__FILE__, $sm->call('blog:valid'));

                    $model = new Model('blog:create');
                    //$response = $sm->trigger('blog:create', ['model' => $model, 'request' => $request]);
                    //var_dump(__FILE__, $sm->plugin('blog:create'));


                    return $response;
                },*/
                //'controller' => '@blog:create', //call event (trigger)
                /*'controller' => function(Response $response, Request $request, ViewManager $vm, array $args = []) {
                    $args['args'][] = [__FUNCTION__];

                    return new Model('home', $args);
                },*/
                'controller' => 'Home',
                /*'controller' => new ControllerAction([
                        function(array $args = []) {
                            return new Model(null, ['args' => $args]);
                        },
                        function(Model $model) {
                            $model['__CONTROLLER__'] = __FUNCTION__;
                            return $model;
                        },
                        function(Model $model) {
                            $model[$model::TEMPLATE] = 'home';
                            return $model;
                        },
                ]),*/
                //'controller' => '@blog:valid',
                //'controller' => '@test', //test() above
                //'controller' => '@phpcredits',
                //'controller' => '@Home',
                //'controller' => '@Home.test',
                /*'controller' => new Call(
                    new Service('Home\Factory', [new ServiceManagerLink]),
                    ['config' => new Dependency('Config'), 'vm' => new Dependency('View\Manager')]
                ),*/
                //'controller' => '@Home\Controller::staticTest',
                //'controller' => ['Home\Controller', 'staticTest'],
                //'controller' => [new Dependency('Home'), 'test'],
                //'controller' => 'Home\Controller::staticTest', //error
                //'controller' => new Home\Controller(new Model('blog:create')),
                //'controller' => new Factory(Home\Factory::class),
                //'controller' => new Service('Home'),
                //'controller' => new Invoke([new Service('Home'), 'test'], ['request' => new Dependency('Request')]),
                /*'controller' => new Hydrator(
                    Home\Controller::class,
                    [
                        'setModel' => new Hydrator(
                            Model::class,
                            [
                                'template'    => 'home',
                                [['Home\Controller', 'staticCall'], ['staticA', 'staticB']],
                                ['Home\Controller', 'staticCall'],
                                new Filter(new Call('request.getHost'), 'var_dump')
                            ]
                        )
                    ]
                ),*/
                'constraints' => [
                    'controller' => '[a-zA-Z0-9_-]*',
                    'action'     => '[a-zA-Z0-9_-]*'
                ]
            ]
        ],
    ]
];
