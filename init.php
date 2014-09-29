<?php
/**
 *
 */
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/ParameterBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/FileBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/ServerBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/HeaderBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/Request.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/ApacheRequest.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/ResponseHeaderBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/Response.php';

/**
 *
 */
include __DIR__ . '/vendor/mvc5/framework/src/Config/ConfigInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Container/ContainerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Manager/EventManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/ApplicationInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config/ConfigTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Container/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Provider/ProviderTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Manager/ManagerTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Factory/FactoryTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Provider/ProviderInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Generator/GeneratorTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Manager/EventManagerTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Manager/EventsTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/ConfigInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/ConfigTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/Application.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Container/Container.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ResolverInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Service/ServiceInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ConfigInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ConfigTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Service/Service.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Param/ParamInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Param/Param.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Filter/FilterInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Filter/Filter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Invoke/InvokeInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Invoke/Invoke.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Dependency/DependencyInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Dependency/Dependency.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Args/ArgsInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Args/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Call/CallInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Call/Call.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ServiceManagerLink/ServiceManagerLinkInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ServiceManagerLink/ServiceManagerLink.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ConfigLink/ConfigLinkInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ConfigLink/ConfigLink.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Child/ChildInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Child/ChildTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Child/Child.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Hydrator/HydratorInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Hydrator/Hydrator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/DefinitionInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Definition.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/EventInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/EventInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/EventTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/EventTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/Request/RequestInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Route/RouteInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Route/Route.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/EventInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Route/ListenerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Route/Listener.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/FilterInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/Filter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/DispatchInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/EventInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/MatchInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Scheme/SchemeInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Scheme/Scheme.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Hostname/HostnameInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Hostname/Hostname.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Path/PathInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Path/Path.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Wildcard/WildcardInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Wildcard/Wildcard.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Method/MethodInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Method/Method.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Dispatch/ListenerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Dispatch/Listener.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/ModelInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ViewModelInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/ModelTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/LayoutInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/ViewModelInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Plugin/PluginTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/EventInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/ListenerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Listener.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/EventInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/ListenerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Listener.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/ResponseInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Layout/ListenerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Layout/Listener.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Render/ListenerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Plugin/PluginInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/RenderInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/AliasTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Render/Listener.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/EventInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/EventInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ListenerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Listener.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/RenderTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/Render.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Response/ListenerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Response/Listener.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/EventInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/EventTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/ListenerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Listener.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/PluginInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Route/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/Plugin.php';

/**
 *
 */
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Builder/BuilderInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Builder/Builder.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/GeneratorInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/Generator.php';
include __DIR__ . '/src/Request/RequestInterface.php';
include __DIR__ . '/src/Request/Request.php';
include __DIR__ . '/src/Response/ResponseInterface.php';
include __DIR__ . '/src/Response/Response.php';

/**
 *
 */
//include __DIR__ . '/src/Home/ViewModelInterface.php';
//include __DIR__ . '/src/Home/ViewModel.php';
//include __DIR__ . '/src/Home/ControllerInterface.php';
//include __DIR__ . '/src/Home/Controller.php';

/**
 *
 */
include __DIR__ . '/vendor/autoload.php';
