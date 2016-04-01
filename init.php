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
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/RedirectResponse.php';

/**
 *
 */
include __DIR__ . '/vendor/mvc5/framework/src/Arg.php';
include __DIR__ . '/vendor/mvc5/framework/src/Signal.php';
include __DIR__ . '/vendor/mvc5/framework/src/Resolvable.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config/ArrayAccess.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config/Configuration.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Container.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Service.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Generator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Model.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event/Signal.php';
include __DIR__ . '/vendor/mvc5/framework/src/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Container.php';
include __DIR__ . '/vendor/mvc5/framework/src/Event.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Service.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Template/View.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Template/Templates.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Template/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Model.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Render.php';
include __DIR__ . '/vendor/mvc5/framework/src/View/Renderer.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Event/Model.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Mvc.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Error.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Error/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Error/BadRequest.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Error/MethodNotAllowed.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Error/NotFound.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Response.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Controller.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Send.php';
include __DIR__ . '/vendor/mvc5/framework/src/Response/Status.php';
include __DIR__ . '/vendor/mvc5/framework/src/Model/Template.php';
include __DIR__ . '/vendor/mvc5/framework/src/Model/Layout.php';
include __DIR__ . '/vendor/mvc5/framework/src/Model/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/Model/ViewLayout.php';
include __DIR__ . '/vendor/mvc5/framework/src/Model/Template/Model.php';
include __DIR__ . '/vendor/mvc5/framework/src/Model/Template/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Model/Template/Layout.php';
include __DIR__ . '/vendor/mvc5/framework/src/Model/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Model/Layout/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Config/Definition.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Config/Route.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Dash.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Params.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Regex.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Tokens.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Build.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Add.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Compile.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Route.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Generator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Action.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Hostname.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Method.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Path.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Scheme.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match/Wildcard.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router/Router.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Definition/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Filter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Match.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Router.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Error/Controller.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Error/Create.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Error/Handler.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Error/ViewModel.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Error/Model.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Error/Status.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Exception/Create.php';
include __DIR__ . '/vendor/mvc5/framework/src/Route/Exception/Controller.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Exception.php';
include __DIR__ . '/vendor/mvc5/framework/src/Controller/Action.php';
include __DIR__ . '/vendor/mvc5/framework/src/Url/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Url/Generator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Controller.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Error.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Layout.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Response.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/Route.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc/View.php';
include __DIR__ . '/vendor/mvc5/framework/src/Resolver/Build.php';
include __DIR__ . '/vendor/mvc5/framework/src/Resolver/Dispatch.php';
include __DIR__ . '/vendor/mvc5/framework/src/Resolver/Exception.php';
include __DIR__ . '/vendor/mvc5/framework/src/Resolver/Generator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Resolver/Initializer.php';
include __DIR__ . '/vendor/mvc5/framework/src/Resolver/Resolver.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Config/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Config/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Config/Child.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Config/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Config/Hydrator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Config/Name.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Gem.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Call.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Calls.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Child.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Copy.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Dependency.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Factory.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/FileInclude.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Filter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Invokable.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Invoke.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Link.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Param.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/Plug.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Gem/SignalArgs.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Args.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Call.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Calls.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Child.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Config.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Copy.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Controller.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Dependency.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Factory.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/FileInclude.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Filter.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Form.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Hydrator.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Invokable.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Invoke.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Link.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Manager.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Plugin.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Model.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Param.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Plug.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Response.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/Service.php';
include __DIR__ . '/vendor/mvc5/framework/src/Plugin/SignalArgs.php';
include __DIR__ . '/vendor/mvc5/framework/src/Request/Request.php';
include __DIR__ . '/vendor/mvc5/framework/src/App.php';
include __DIR__ . '/vendor/mvc5/framework/src/Web.php';
include __DIR__ . '/vendor/mvc5/framework/src/Layout.php';
include __DIR__ . '/vendor/mvc5/framework/src/Model.php';
include __DIR__ . '/vendor/mvc5/framework/src/Template.php';
include __DIR__ . '/vendor/mvc5/framework/src/Mvc.php';
include __DIR__ . '/vendor/mvc5/framework/src/Middleware.php';

/**
 *
 */
include __DIR__ . '/src/Request/Request.php';
include __DIR__ . '/src/Request/HttpRequest.php';
include __DIR__ . '/src/Response/Response.php';
include __DIR__ . '/src/Response/Base.php';
include __DIR__ . '/src/Response/HttpResponse.php';
include __DIR__ . '/src/Response/RedirectResponse.php';

/**
 *
 */
/*include __DIR__ . '/src/Blog/Model.php';
include __DIR__ . '/src/Blog/Controller.php';
include __DIR__ . '/src/Blog/Add/Validate.php';
include __DIR__ . '/src/Blog/Add/Save.php';
include __DIR__ . '/src/Blog/Add/Respond.php';
include __DIR__ . '/src/Home/Factory.php';
include __DIR__ . '/src/Home/Controller.php';
include __DIR__ . '/src/Home/Model.php';
include __DIR__ . '/src/Console/Example.php';
include __DIR__ . '/src/Plugin/Gem/Controller.php';
include __DIR__ . '/src/Plugin/Gem/Route.php';
include __DIR__ . '/src/Plugin/Controller.php';
include __DIR__ . '/src/Plugin/Route.php';
include __DIR__ . '/src/Service/Provider.php';*/

/**
 *
 */
include __DIR__ . '/vendor/autoload.php';
