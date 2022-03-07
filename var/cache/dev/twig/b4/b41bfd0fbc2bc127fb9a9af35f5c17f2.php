<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* professeurs/index.html.twig */
class __TwigTemplate_2049898a6742ab42134d3490f2e596a6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "professeurs/index.html.twig"));

        // line 1
        echo "<div class=\"professeurs\">
    <a href=\"";
        // line 2
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("professeurs_create");
        echo "\"> Ajouter un professeur </a>
</div>
</br>
<table>
    <tr>
        <th>Nom</th><th>Prenom</th>
    </tr>
    ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["professeurs"]) || array_key_exists("professeurs", $context) ? $context["professeurs"] : (function () { throw new RuntimeError('Variable "professeurs" does not exist.', 9, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["professeur"]) {
            // line 10
            echo "        <tr>
            <td>";
            // line 11
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professeur"], "nom", [], "any", false, false, false, 11), "html", null, true);
            echo "</td><td>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["professeur"], "prenom", [], "any", false, false, false, 11), "html", null, true);
            echo "</td>
            <td>
                <a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("professeurs_edit", ["id" => twig_get_attribute($this->env, $this->source, $context["professeur"], "id", [], "any", false, false, false, 13)]), "html", null, true);
            echo "\">Editer</a>
                <a href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("professeurs_remove", ["id" => twig_get_attribute($this->env, $this->source, $context["professeur"], "id", [], "any", false, false, false, 14)]), "html", null, true);
            echo "\">Supprimer</a>
            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['professeur'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "</table>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "professeurs/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 18,  71 => 14,  67 => 13,  60 => 11,  57 => 10,  53 => 9,  43 => 2,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"professeurs\">
    <a href=\"{{path('professeurs_create')}}\"> Ajouter un professeur </a>
</div>
</br>
<table>
    <tr>
        <th>Nom</th><th>Prenom</th>
    </tr>
    {% for professeur in professeurs %}
        <tr>
            <td>{{ professeur.nom }}</td><td>{{ professeur.prenom }}</td>
            <td>
                <a href=\"{{ path('professeurs_edit', {'id': professeur.id}) }}\">Editer</a>
                <a href=\"{{ path('professeurs_remove', {'id': professeur.id}) }}\">Supprimer</a>
            </td>
        </tr>
    {% endfor %}
</table>
", "professeurs/index.html.twig", "C:\\Users\\dloisel002\\Documents\\tpSymfony\\edt\\templates\\professeurs\\index.html.twig");
    }
}
