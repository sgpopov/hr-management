<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\DB;

class StoreWebRoutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:store-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store the application routes in the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param Router $router
     *
     * @return mixed
     */
    public function handle(Router $router)
    {
        $routes = $this->getRoutes($router);

        $this->removeDeprecatedRoutes($routes);
        $this->storeRoutes($routes);
    }

    /**
     * Returns list with all routes and their meta info - method, URI, name.
     * Some routes, such as the authentication routes, are excluded.
     *
     * @param Router $router
     *
     * @return array
     */
    protected function getRoutes(Router $router) : array
    {
        $skipRoutes = [
            'home', 'login', 'login.post', 'logout', 'password.request.post',
            'password.request', 'password.reset.post', 'password.reset'
        ];

        $routes = [];

        foreach ($router->getRoutes()->getRoutes() as $route) {
            if (in_array($route->getName(), $skipRoutes)) {
                continue;
            }

            $routes[] = [
                'uri' => $route->uri(),
                'methods' => implode('|', $route->methods()),
                'name' => $route->getName(),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ];
        }

        return $routes;
    }

    /**
     * Remove deprecated routes from the database.
     *
     * @param array $routes
     *
     * @return void
     */
    protected function removeDeprecatedRoutes($routes)
    {
        if (empty($routes)) {
            return;
        }

        DB::table('web_routes')
            ->whereNotIn('uri', array_column($routes, 'uri'))
            ->delete();
    }

    /**
     * Store the application routes in the database.
     *
     * @param array $routes
     *
     * @return void
     */
    protected function storeRoutes($routes)
    {
        if (empty($routes)) {
            return;
        }

        $routes = $this->getDistinctNewRoutes($routes);

        if (empty($routes)) {
            return;
        }

        DB::table('web_routes')->insert($routes);
    }

    /**
     * Return list with all new distinct (HTTP method + URI) routes.
     *
     * @param array $routes
     *
     * @return array
     */
    protected function getDistinctNewRoutes($routes) : array
    {
        $existentRoutes = DB::table('web_routes')
            ->select('methods', 'uri')
            ->get();

        $existentRoutes = json_decode(json_encode($existentRoutes), true);

        if (empty($existentRoutes)) {
            return $routes;
        }

        foreach ($routes as $idx => $route) {
            foreach ($existentRoutes as $i => $existentRoute) {
                if ($existentRoute['uri'] === $route['uri'] && $existentRoute['methods'] === $route['methods']) {
                    unset($routes[$idx]);
                    unset($existentRoutes[$i]);
                }
            }
        }

        return $routes;
    }
}
