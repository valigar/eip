<?php

/* ::layout.html.twig */
class __TwigTemplate_b51e5625d21705dd0316b9431279587c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'content_header' => array($this, 'block_content_header'),
            'content_header_more' => array($this, 'block_content_header_more'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo " ";
        $this->displayBlock('head', $context, $blocks);
        // line 12
        echo "
";
        // line 13
        $this->displayBlock('body', $context, $blocks);
    }

    // line 1
    public function block_head($context, array $blocks = array())
    {
        // line 2
        echo "\t<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
\t";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        // line 7
        echo "\t";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 10
        echo "  </head>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Demo Bundle";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "      <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bootstrap/css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    ";
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session"), "flashbag"), "get", array(0 => "notice"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 15
            echo "        <div class=\"flash-message\">
            <em>Notice</em>: ";
            // line 16
            echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : $this->getContext($context, "flashMessage")), "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "
    ";
        // line 20
        $this->displayBlock('content_header', $context, $blocks);
        // line 29
        echo "
    <div class=\"block\">
        ";
        // line 31
        $this->displayBlock('content', $context, $blocks);
        // line 32
        echo "    </div>
\t</div>
 
      <hr>
 
      <footer>
        <p>Pentacle Technologie.</p>
      </footer>
    </div>

    ";
        // line 42
        if (array_key_exists("code", $context)) {
            // line 43
            echo "        <h2>Code behind this page</h2>
        <div class=\"block\">
            <div class=\"symfony-content\">";
            // line 45
            echo (isset($context["code"]) ? $context["code"] : $this->getContext($context, "code"));
            echo "</div>
        </div>
    ";
        }
    }

    // line 20
    public function block_content_header($context, array $blocks = array())
    {
        // line 21
        echo "        <ul id=\"menu\">
            ";
        // line 22
        $this->displayBlock('content_header_more', $context, $blocks);
        // line 25
        echo "        </ul>

        <div style=\"clear: both\"></div>
    ";
    }

    // line 22
    public function block_content_header_more($context, array $blocks = array())
    {
        // line 23
        echo "                <li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("homepage"), "html", null, true);
        echo "\">Home</a></li>
            ";
    }

    // line 31
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  153 => 31,  146 => 23,  143 => 22,  136 => 25,  134 => 22,  131 => 21,  128 => 20,  120 => 45,  116 => 43,  114 => 42,  102 => 32,  100 => 31,  96 => 29,  94 => 20,  91 => 19,  82 => 16,  79 => 15,  74 => 14,  71 => 13,  64 => 8,  61 => 7,  55 => 6,  50 => 10,  47 => 7,  45 => 6,  39 => 2,  36 => 1,  32 => 13,  29 => 12,  26 => 1,);
    }
}
