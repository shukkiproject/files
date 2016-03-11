<?php

/* IabsisVideothequeBundle:Admin:sidebar_admin.html.twig */
class __TwigTemplate_6a69e051de88af66562cdc69f74860b15c3bf936f07446e629fdacc988c8e542 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sidebar' => array($this, 'block_sidebar'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('sidebar', $context, $blocks);
    }

    public function block_sidebar($context, array $blocks = array())
    {
        // line 2
        echo "
<ul id=\"menu-genres\" class=\"nav nav-list\">
    <li class=\"nav-header\">Administrer</li>
    <li ";
        // line 5
        if ((((array_key_exists("section", $context)) ? (_twig_default_filter((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "")) : ("")) == "genre")) {
            echo "class=\"active\"";
        }
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getPath("genre");
        echo "\">Genres</a></li>
    <li ";
        // line 6
        if ((((array_key_exists("section", $context)) ? (_twig_default_filter((isset($context["section"]) ? $context["section"] : $this->getContext($context, "section")), "")) : ("")) == "film")) {
            echo "class=\"active\"";
        }
        echo "><a href=\"";
        echo $this->env->getExtension('routing')->getPath("film");
        echo "\">Films</a></li>
</ul>    
";
    }

    public function getTemplateName()
    {
        return "IabsisVideothequeBundle:Admin:sidebar_admin.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  39 => 6,  31 => 5,  26 => 2,  20 => 1,);
    }
}
