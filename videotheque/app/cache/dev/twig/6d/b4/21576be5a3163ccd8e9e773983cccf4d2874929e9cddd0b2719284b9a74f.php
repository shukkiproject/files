<?php

/* ::base.html.twig */
class __TwigTemplate_6db421576be5a3163ccd8e9e773983cccf4d2874929e9cddd0b2719284b9a74f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sidebar' => array($this, 'block_sidebar'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <title>Bootstrap, from Twitter</title>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">

    <!-- Le styles -->
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/iabsisvideotheque/css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/iabsisvideotheque/css/videotheque-spec.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/iabsisvideotheque/css/font-awesome.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <style type=\"text/css\">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

    </style>
    <link href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/iabsisvideotheque/css/bootstrap-responsive.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

  </head>

  <body>
    <div class=\"container-fluid\">
      <div class=\"row-fluid\">
        <div class=\"span3\">
          <div class=\"well sidebar-nav\">
            ";
        // line 33
        $this->displayBlock('sidebar', $context, $blocks);
        // line 34
        echo "          </div><!--/.well -->
        </div><!--/span sidebar-->

        <div class=\"span9\">
          <div class=\"hero-unit\">
            ";
        // line 39
        $this->displayBlock('body', $context, $blocks);
        // line 40
        echo "
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Iabsis 2015</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/iabsisvideotheque/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/iabsisvideotheque/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/iabsisvideotheque/js/app.js"), "html", null, true);
        echo "\"></script>

  </body>
</html>
";
    }

    // line 33
    public function block_sidebar($context, array $blocks = array())
    {
    }

    // line 39
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 39,  113 => 33,  104 => 58,  100 => 57,  96 => 56,  78 => 40,  76 => 39,  69 => 34,  67 => 33,  55 => 24,  41 => 13,  37 => 12,  33 => 11,  21 => 1,);
    }
}
