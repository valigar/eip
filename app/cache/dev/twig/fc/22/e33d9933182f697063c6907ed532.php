<?php

/* UserBlocNoteBundle:Default:show.html.twig */
class __TwigTemplate_fc22e33d9933182f697063c6907ed532 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
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
        $this->displayBlock('title', $context, $blocks);
        // line 9
        echo "
";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 15
        echo "

<a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_blocnote_default_report", array("id" => (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")))), "html", null, true);
        echo "\">Rapporter un contenu frauduleux</a>


";
        // line 20
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "hasFlash", array(0 => "notice"), "method")) {
            // line 21
            echo "    <div class=\"flash-notice\">
        ";
            // line 22
            echo $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flash", array(0 => "notice"), "method");
            echo "
    </div>
";
        }
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

    // line 6
    public function block_title($context, array $blocks = array())
    {
        // line 7
        echo "    SHOW NOTE
";
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        // line 11
        echo "
    ";
        // line 12
        echo (isset($context["content"]) ? $context["content"] : $this->getContext($context, "content"));
        echo "

";
    }

    public function getTemplateName()
    {
        return "UserBlocNoteBundle:Default:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 12,  79 => 11,  76 => 10,  71 => 7,  68 => 6,  61 => 4,  58 => 3,  50 => 22,  47 => 21,  45 => 20,  39 => 17,  35 => 15,  33 => 10,  30 => 9,  28 => 6,  26 => 3,  22 => 1,);
    }
}
