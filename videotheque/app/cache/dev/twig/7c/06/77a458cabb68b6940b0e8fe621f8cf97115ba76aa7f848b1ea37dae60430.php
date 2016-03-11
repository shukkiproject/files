<?php

/* IabsisVideothequeBundle:Default:videotheque_home.html.twig */
class __TwigTemplate_7c0677a458cabb68b6940b0e8fe621f8cf97115ba76aa7f848b1ea37dae60430 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $_trait_0 = $this->env->loadTemplate("IabsisVideothequeBundle:Default:sidebar_genres.html.twig");
        // line 3
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."IabsisVideothequeBundle:Default:sidebar_genres.html.twig".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'body' => array($this, 'block_body'),
            )
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["films"]) ? $context["films"] : $this->getContext($context, "films")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["film"]) {
            // line 7
            echo "        <div class=\"block\">
            <h2>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["film"], "titre", array()), "html", null, true);
            echo "</h2>
            <div class=\"tags-list\">";
            // line 9
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["film"], "listeDesGenres", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["Genre"]) {
                if (($this->getAttribute($context["loop"], "index", array()) > 1)) {
                    echo ",";
                }
                echo " <span class=\"badge\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Genre"], "label", array()), "html", null, true);
                echo "</span>";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Genre'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "</div>
            <div class=\"illustration\">
                ";
            // line 11
            if ($this->getAttribute($context["film"], "illustration", array(), "any", true, true)) {
                // line 12
                echo "                    <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["film"], "illustration", array()), "html", null, true);
                echo "\" />
                ";
            } else {
                // line 14
                echo "                    <span class=\"fa fa-ban\"></span>
                ";
            }
            // line 16
            echo "            </div>
            <div class=\"description\">
                ";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["film"], "description", array()), "html", null, true);
            echo "
            </div>
            <div class=\"read-more\">
                <a class=\"btn btn-primary btn-small\" href=\"#\">Voir</a>
            </div>
        </div>
    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 24
            echo "<div class=\"alert\">Désolé, il n'y a aucun film dans cette section</div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['film'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "IabsisVideothequeBundle:Default:videotheque_home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 24,  119 => 18,  115 => 16,  111 => 14,  105 => 12,  103 => 11,  65 => 9,  61 => 8,  58 => 7,  52 => 6,  49 => 5,  40 => 1,  22 => 3,  11 => 1,);
    }
}
