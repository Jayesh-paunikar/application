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
include __DIR__ . '/vendor/mvc5/framework/src/Service/Resolver/ResolverInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Resolver/SignalTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/AliasTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Resolver/ResolverTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Manager/ManagerTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/FactoryTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Generator/GeneratorTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Manager/EventManagerTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Manager/EventsTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/ConfigInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/ConfigTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/Application.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/WebInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/Web.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Container/Container.php';
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
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Factory/FactoryInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Factory/Factory.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/DefinitionInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Definition.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/EventInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/MvcInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/EventTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Mvc.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Route/RouteInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Route/Route.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/DispatchInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Route/DispatcherInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Route/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/FilterInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/Filter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/DispatcherInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/MatchInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Match.php';
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
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Dispatch/DispatcherInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Dispatch/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/ModelInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ViewModelInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/ModelTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/LayoutInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/ViewModelInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/PluginTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/DispatchInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/DispatcherInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/DispatchInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/DispatcherInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/ResponseInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Layout/RendererInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Layout/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/View/RendererInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/RenderInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/View/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/RendererInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/RendererTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/RenderInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Render.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/RendererInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/Render.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Response/DispatcherInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Response/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/DispatchInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/DispatcherInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Dispatcher.php';
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
