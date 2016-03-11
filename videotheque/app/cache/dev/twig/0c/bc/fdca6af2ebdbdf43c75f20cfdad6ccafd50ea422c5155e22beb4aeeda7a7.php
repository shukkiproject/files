<?php

/* IabsisVideothequeBundle:Security:login.html.twig */
class __TwigTemplate_0cbcfdca6af2ebdbdf43c75f20cfdad6ccafd50ea422c5155e22beb4aeeda7a7 extends Twig_Template
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

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Authentification requise";
    }

    // line 4
    public function block_body($context, array $blocks = array())
    {
        // line 5
        echo "    ";
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 6
            echo "        <div class=\"error\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "</div>
    ";
        }
        // line 8
        echo " 
    <form action=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("_security_login_check");
        echo "\" method=\"POST\">
        
        <input type=\"hidden\" name=\"_target_path\" value=\"";
        // line 11
        echo $this->env->getExtension('routing')->getUrl("iabsis_videotheque_admin");
        echo "\" />

        <div>
            <label for=\"username\">Username:</label>
            <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" />
        </div>
        
        <div>
            <label for=\"password\">Password:</label>
            <input type=\"password\" id=\"password\" name=\"_password\" />
        </div>  
        
        <input type=\"submit\" name=\"login\" value=\"submit\" />
        
    </form>
";
    }

    public function getTemplateName()
    {
        return "IabsisVideothequeBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 15,  63 => 11,  58 => 9,  55 => 8,  49 => 6,  46 => 5,  43 => 4,  37 => 2,  11 => 1,);
    }
}
