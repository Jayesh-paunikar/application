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
include __DIR__ . '/vendor/mvc5/framework/src/Config/Configuration.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Container/ServiceContainer.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Manager/ServiceManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Manager/EventManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/Application.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config/ConfigTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Container/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Resolver/ResolverArgs.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Resolver/SignalTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/AliasTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Resolver/ResolverTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Manager/ServiceManagerTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/FactoryTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Generator/GeneratorTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Manager/EventManagerTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Manager/Events.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/Configuration.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/ConfigTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/App.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/WebApplication.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/Web.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Container/Container.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Service/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Configuration.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ConfigTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Service/Service.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Param/ServiceParam.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Param/Param.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Filter/ServiceFilter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Filter/Filter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Invoke/ServiceInvoke.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Invoke/Invoke.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Dependency/ServiceDependency.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Dependency/Dependency.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Args/Arguments.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Args/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Call/ServiceCall.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Call/Call.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ServiceManagerLink/ManagerLink.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ServiceManagerLink/ServiceManagerLink.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ConfigLink/ConfigServiceLink.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ConfigLink/ConfigLink.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Child/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Child/ChildTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Child/Child.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Router/RouterService.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Router/Router.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Hydrator/ServiceHydrator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Hydrator/Hydrator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Factory/ServiceFactory.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Factory/Factory.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Manager/ServiceManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/RouteDefinition.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Definition.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Mvc.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/EventTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/MvcEvent.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Route.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/RouterDispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/RouteManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Route/RouteRouter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Route/Router.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/RouterFilter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/Filter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/RouteRouter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/Router.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/RouteMatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Match.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Scheme/MatchScheme.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Scheme/Scheme.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Hostname/MatchHostname.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Hostname/Hostname.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Path/MatchPath.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Path/Path.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Wildcard/MatchWildcard.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Wildcard/Wildcard.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Method/MatchMethod.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Method/Method.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Controller/ControllerDispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Controller/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/ControllerManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ExceptionViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/ModelTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/Layout.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/LayoutViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/PluginTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/ControllerDispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/ControllerDispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/ExceptionDispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/ExceptionController.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Controller.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/ResponseInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Layout/LayoutRenderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Layout/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/View/ViewRenderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/ViewRender.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/ViewManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/View/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Renderer/ViewRenderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Renderer/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Renderer/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ExceptionView.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/View.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ViewRenderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/Render.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Response/ResponseDispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Response/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/ManagerInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/DispatchInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/SenderInterface.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Sender.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/RoutePlugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/ServiceTrait.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/Plugin.php';

/**
 *
 */
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Builder/DefinitionBuilder.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Builder/Builder.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/RouteGenerator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/Generator.php';
include __DIR__ . '/src/Request/RequestInterface.php';
include __DIR__ . '/src/Request/Request.php';
include __DIR__ . '/src/Response/ResponseInterface.php';
include __DIR__ . '/src/Response/Response.php';

/**
 *
 */
//include __DIR__ . '/src/Home/HomeViewModel.php';
//include __DIR__ . '/src/Home/ViewModel.php';
//include __DIR__ . '/src/Home/HomeController.php';
//include __DIR__ . '/src/Home/Controller.php';

/**
 *
 */
include __DIR__ . '/vendor/autoload.php';
