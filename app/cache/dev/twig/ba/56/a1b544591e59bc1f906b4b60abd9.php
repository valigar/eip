<?php

/* UserUserBundle:Student:classroomList.html.twig */
class __TwigTemplate_ba56a1b544591e59bc1f906b4b60abd9 extends Twig_Template
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
        echo "<TABLE BORDER=\"1\">
    <CAPTION> Liste des classes que vous pouvez rejoindre </CAPTION>
    <TR>
        <TH> Nom de la Classe </TH>
        <TH> Description de la Classe </TH>
        <TH> Rejoindre </TH>
    </TR>
    ";
        // line 13
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["classroom_list"]) ? $context["classroom_list"] : $this->getContext($context, "classroom_list")));
        foreach ($context['_seq'] as $context["_key"] => $context["list"]) {
            // line 14
            echo "        <TR>
            <TD> ";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")), "classname"), "html", null, true);
            echo " </TD>
            <TD> ";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")), "description"), "html", null, true);
            echo " </TD>
            <TD>
                <a href=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_student_join_classroom", array("classId" => $this->getAttribute((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")), "id"))), "html", null, true);
            echo "\">
                    <input type=\"submit\" value=\"Rejoindre la Classe\"/>
                </a>

            </TD>
        </TR>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['list'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "</TABLE>";
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
        return "UserUserBundle:Student:classroomList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 4,  68 => 3,  64 => 25,  51 => 18,  46 => 16,  42 => 15,  39 => 14,  35 => 13,  26 => 6,  24 => 3,  20 => 1,);
    }
}
