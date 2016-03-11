<?php

/* IabsisVideothequeBundle:Film:index.html.twig */
class __TwigTemplate_da7db0fd4bb111834c660f9e3f79c19e8ee42c0e4574d75a1fa00cd0b137a494 extends Twig_Template
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

        $_trait_0 = $this->env->loadTemplate("IabsisVideothequeBundle:Admin:sidebar_admin.html.twig");
        // line 3
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."IabsisVideothequeBundle:Admin:sidebar_admin.html.twig".'" cannot be used as a trait.');
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
        // line 7
        echo "<div class=\"row\">
        <div class=\"span12\">
            <h1>Liste de films</h1>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"span12\">
            <table class=\"table table-bordered table-hover records_list\">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities")));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 26
            echo "                    <tr>
                        <td><a href=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("film_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "id", array()), "html", null, true);
            echo "</a></td>
                        <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "titre", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["entity"], "description", array()), "html", null, true);
            echo "</td>
                        <td>
                            <a class=\"btn btn-medium btn-info\" href=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("film_show", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\"><i class=\"fa fa-eye-open\"></i> show</a>
                            <a class=\"btn btn-medium btn-default\" href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("film_edit", array("id" => $this->getAttribute($context["entity"], "id", array()))), "html", null, true);
            echo "\"><i class=\"fa fa-edit\"></i> edit</a>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                </tbody>
            </table>
        </div>
    </div>

    <div class=\"row\">
        <div class=\"span12\">
            <a class=\"btn btn-success\" href=\"";
        // line 43
        echo $this->env->getExtension('routing')->getPath("film_new");
        echo "\">
                <i class=\"fa fa-plus\"></i> Créer un nouveau film
            </a>
        </div>
    </div>
    ";
    }

    public function getTemplateName()
    {
        return "IabsisVideothequeBundle:Film:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 43,  108 => 36,  98 => 32,  94 => 31,  89 => 29,  85 => 28,  79 => 27,  76 => 26,  72 => 25,  52 => 7,  49 => 5,  40 => 1,  22 => 3,  11 => 1,);
    }
}
