<?php

/* AcmeDemoBundle:Welcome:index.html.twig */
class __TwigTemplate_fc4343cbb56494c8aef81fc8e8d9de1b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("AcmeDemoBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "DG - Welcome";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $context["version"] = ((twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MAJOR_VERSION") . ".") . twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MINOR_VERSION"));
        // line 7
        echo "
    <div class=\"container\">
      <div id=\"header\" class=\"hero-unit\">
\t  <h1>Digital Teacher</h1>
\t  </div>
\t  <div class=\"row\">
        <div id=\"menu\" class=\"span3\">
          <ul class=\"nav nav-pills nav-stacked\">
            <a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_login"), "html", null, true);
        echo "\" class=\"sf-button sf-button-selected\"></li>
                 <span class=\"btn btn-primary btn-large\"\">Login</span><br/><br/>
\t\t\t</a>
\t\t\t<a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_registration_register"), "html", null, true);
        echo "\" class=\"sf-button sf-button-selected\">
\t\t\t\t<span class=\"btn-bg\">inscription</span>
            </a>
\t\t</div>
       </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Welcome:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 18,  51 => 15,  41 => 7,  38 => 6,  35 => 5,  29 => 3,);
    }
}
