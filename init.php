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
include __DIR__ . '/vendor/mvc5/framework/src/Config/ArrayAccess.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config/Base.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Container/Service.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Resolver/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Resolver/Signal.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Resolver/Resolvable.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Manager/Alias.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Manager/Initializer.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Resolver/Resolver.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Manager/ManageService.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Factory/Base.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Generator/EventGenerator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Manager/ManageEvent.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Manager/Events.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/Configuration.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/Base.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Config/Events.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/App.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/WebApplication.php';
include __DIR__ . '/vendor/mvc5/framework/src/Application/Web.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Container/Container.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Configuration.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Service/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Base.php';
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
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ServiceManagerLink/ServiceManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ServiceManagerLink/ServiceManagerLink.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ConfigLink/ConfigServiceLink.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ConfigLink/ConfigLink.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Child/ChildService.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Child/Base.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Child/Child.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Router/RouterService.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Router/Router.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Hydrator/ServiceHydrator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Hydrator/Hydrator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Factory/ServiceFactory.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Factory/Factory.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Manager/ServiceManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Definition.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/RouteDefinition.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ServiceConfig/ServiceConfiguration.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config/ServiceConfig/ServiceConfig.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Base.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/Service/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Base.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Mvc.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Route.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/RouteDispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/RouteManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Manager/ManageRoute.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Route/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Route/Router.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/FilterRoute.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/Filter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/MatchRoute.php';
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
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/ManageController.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Controller/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Controller/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/ControllerManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/LayoutModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ExceptionModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model/Base.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Model.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/ManageView.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/ViewPlugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/ViewTemplates.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Layout/Model.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Action.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Controller.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Dispatch/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/DispatchException.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Exception.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception/Controller.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Response.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Layout/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Layout/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/View/Render.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/RenderView.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/ViewManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/View/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Renderer/ViewRenderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Renderer/RenderView.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Renderer/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/ViewException.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/View.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Render.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Exception/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render/Render.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/ManageResponse.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Response/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Response/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/ResponseManager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Manager/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/DispatchResponse.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Send.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Sender.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Exception/ResponseException.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Exception/Exception.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Exception/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Exception/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Exception/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Exception/Render.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Exception/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/RouteService.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/GenerateRoute.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/GeneratorPlugin.php';

/**
 *
 */
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Builder/DefinitionBuilder.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Builder/Builder.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/RouteGenerator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator/Generator.php';
include __DIR__ . '/src/Request/Request.php';
include __DIR__ . '/src/Request/HttpRequest.php';
include __DIR__ . '/src/Response/Response.php';
include __DIR__ . '/src/Response/HttpResponse.php';

/**
 *
 */
//include __DIR__ . '/vendor/mvc5/framework/src/View/Model/Model.php';
//include __DIR__ . '/src/Home/Home.php';
//include __DIR__ . '/src/Home/Controller.php';

/**
 *
 */
include __DIR__ . '/vendor/autoload.php';
