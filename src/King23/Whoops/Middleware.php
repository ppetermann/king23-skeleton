<?php
namespace King23\Whoops;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

/**
 * Class Middleware
 * simple middleware to use whoops within king23 based apps
 *
 * this should also work with other psr-7 middlewars as long as they use
 * the request,response,callable-next signature
 *
 * @package King23\Whoops
 */
class Middleware
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param callable $next
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response,callable $next)
    {
        try {
            $next($request, $response);
        } catch (\Exception $e){
            $whoops = $this->getWhoops();
            $body = $whoops->handleException($e);

            $response->getBody()->write($body);
            return $response->withStatus(500);
        }
        return $response;
    }

    /**
     * @return Run
     */
    protected function getWhoops()
    {
        $whoops = new Run();
        $whoops->pushHandler(new PrettyPageHandler());
        $whoops->writeToOutput(false);
        $whoops->allowQuit(false);
        return $whoops;
    }
}
