<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            // _security_login_check
            if ($pathinfo === '/login_check') {
                return array('_route' => '_security_login_check');
            }

            // _security_logout
            if ($pathinfo === '/logout') {
                return array('_route' => '_security_logout');
            }

        }

        // _index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_index');
            }

            return array (  'label' => '',  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\DefaultController::indexAction',  '_route' => '_index',);
        }

        // _filter_by_genre
        if (0 === strpos($pathinfo, '/filter-by-genre') && preg_match('#^/filter\\-by\\-genre(?:/(?P<label>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => '_filter_by_genre')), array (  'label' => '',  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/illustration')) {
            // illustration
            if (rtrim($pathinfo, '/') === '/illustration') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_illustration;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'illustration');
                }

                return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\IllustrationController::indexAction',  '_route' => 'illustration',);
            }
            not_illustration:

            // illustration_create
            if ($pathinfo === '/illustration/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_illustration_create;
                }

                return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\IllustrationController::createAction',  '_route' => 'illustration_create',);
            }
            not_illustration_create:

            // illustration_new
            if ($pathinfo === '/illustration/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_illustration_new;
                }

                return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\IllustrationController::newAction',  '_route' => 'illustration_new',);
            }
            not_illustration_new:

            // illustration_show
            if (preg_match('#^/illustration/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_illustration_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'illustration_show')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\IllustrationController::showAction',));
            }
            not_illustration_show:

            // illustration_edit
            if (preg_match('#^/illustration/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_illustration_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'illustration_edit')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\IllustrationController::editAction',));
            }
            not_illustration_edit:

            // illustration_update
            if (preg_match('#^/illustration/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_illustration_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'illustration_update')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\IllustrationController::updateAction',));
            }
            not_illustration_update:

            // illustration_delete
            if (preg_match('#^/illustration/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_illustration_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'illustration_delete')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\IllustrationController::deleteAction',));
            }
            not_illustration_delete:

        }

        // _security_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\SecurityController::loginAction',  '_route' => '_security_login',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // iabsis_videotheque_admin
            if ($pathinfo === '/admin') {
                return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\AdminController::indexAction',  '_route' => 'iabsis_videotheque_admin',);
            }

            if (0 === strpos($pathinfo, '/admin/genre')) {
                // genre
                if (rtrim($pathinfo, '/') === '/admin/genre') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_genre;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'genre');
                    }

                    return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\GenreController::indexAction',  '_route' => 'genre',);
                }
                not_genre:

                // genre_create
                if ($pathinfo === '/admin/genre/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_genre_create;
                    }

                    return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\GenreController::createAction',  '_route' => 'genre_create',);
                }
                not_genre_create:

                // genre_new
                if ($pathinfo === '/admin/genre/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_genre_new;
                    }

                    return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\GenreController::newAction',  '_route' => 'genre_new',);
                }
                not_genre_new:

                // genre_show
                if (preg_match('#^/admin/genre/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_genre_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'genre_show')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\GenreController::showAction',));
                }
                not_genre_show:

                // genre_edit
                if (preg_match('#^/admin/genre/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_genre_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'genre_edit')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\GenreController::editAction',));
                }
                not_genre_edit:

                // genre_update
                if (preg_match('#^/admin/genre/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_genre_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'genre_update')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\GenreController::updateAction',));
                }
                not_genre_update:

                // genre_delete
                if (preg_match('#^/admin/genre/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_genre_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'genre_delete')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\GenreController::deleteAction',));
                }
                not_genre_delete:

            }

            if (0 === strpos($pathinfo, '/admin/film')) {
                // film
                if (rtrim($pathinfo, '/') === '/admin/film') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_film;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'film');
                    }

                    return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\FilmController::indexAction',  '_route' => 'film',);
                }
                not_film:

                // film_create
                if ($pathinfo === '/admin/film/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_film_create;
                    }

                    return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\FilmController::createAction',  '_route' => 'film_create',);
                }
                not_film_create:

                // film_new
                if ($pathinfo === '/admin/film/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_film_new;
                    }

                    return array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\FilmController::newAction',  '_route' => 'film_new',);
                }
                not_film_new:

                // film_show
                if (preg_match('#^/admin/film/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_film_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'film_show')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\FilmController::showAction',));
                }
                not_film_show:

                // film_edit
                if (preg_match('#^/admin/film/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_film_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'film_edit')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\FilmController::editAction',));
                }
                not_film_edit:

                // film_update
                if (preg_match('#^/admin/film/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_film_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'film_update')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\FilmController::updateAction',));
                }
                not_film_update:

                // film_delete
                if (preg_match('#^/admin/film/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_film_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'film_delete')), array (  '_controller' => 'Iabsis\\VideothequeBundle\\Controller\\FilmController::deleteAction',));
                }
                not_film_delete:

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
