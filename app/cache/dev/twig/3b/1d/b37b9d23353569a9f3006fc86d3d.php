<?php

/* SonataUserBundle:Profile:show.html.twig */
class __TwigTemplate_3b1db37b9d23353569a9f3006fc86d3d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "
<div class=\"sonata-user-show\">

    <b>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "fullname"), "html", null, true);
        echo "</b>

    <ul>
        <li><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sonata_user_profile_edit"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_edit_profile", array(), "SonataUserBundle"), "html", null, true);
        echo "</a></li>
        <li><a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("sonata_user_profile_edit_authentication"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("link_edit_authentication", array(), "SonataUserBundle"), "html", null, true);
        echo "</a></li>
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "SonataUserBundle:Profile:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 18,  30 => 17,  24 => 14,  19 => 11,);
    }
}
