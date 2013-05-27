<?php

/* UserBlocNoteBundle:Default:index.html.twig */
class __TwigTemplate_703ffed34c59cb1b35699781a49faa93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<meta charset=\"UTF-8\" />
";
        // line 3
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 6
        echo "L'utilisateur connecté est : ";
        echo twig_escape_filter($this->env, (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "html", null, true);
        echo "

";
        // line 8
        echo $this->env->getExtension('stfalcon_tinymce')->tinymce_init();
        echo "

<form method=\"post\" ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">

    ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "noteContent"), 'label', (twig_test_empty($_label_ = $this->env->getExtension('translator')->trans("Bloc Note")) ? array() : array("label" => $_label_)));
        echo "
    ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "noteContent"), 'widget');
        echo "

    <input type=\"submit\" />
</form>


<a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_blocnote_default_show", array("id" => (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")))), "html", null, true);
        echo "\">Visualiser la note</a>";
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "\t<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
";
    }

    public function getTemplateName()
    {
        return "UserBlocNoteBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 4,  60 => 3,  55 => 19,  46 => 13,  42 => 12,  37 => 10,  32 => 8,  26 => 6,  24 => 3,  20 => 1,);
    }
}
