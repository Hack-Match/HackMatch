<?php
/*
     "Because thinking of var names is hard"
     -- short var names --
     set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
     -- cool var names --
     perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
     -- combinations --
     metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
*/

namespace Perceptron
{
    class Cluster
    {
        public string $gamma = 'Perceptron Gamma Cascade';
    }
}

namespace Matrix
{
    class Cluster
    {
        public string $gamma = 'Matrix Gamma Cascade';
    }
}

namespace Cascade
{
    
    use Perceptron\Cluster;
    
    class FeatureExtract
    {
        public static function compute() { return (new Cluster)->gamma; }
    }
}

namespace Matrix
{
    function jaNamespace() {
        $s1 = (new Cluster)->gamma;
        $s2 = \Cascade\FeatureExtract::compute();
        return "The PHP Artificial Intelligence implements new NLP algorithms: <br> $s1 <br> $s2";
    }
}

namespace
{
    
    use Perceptron\Cluster;
    
    $namespace_code = <<<'NAMESPACE_CODE'
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:35 PM
 */
namespace Matrix
{
    class Cluster
    {
        public string $gamma = 'Matrix Gamma Cascade';
    }
}
namespace Perceptron
{
    class Cluster
    {
        public string $gamma = 'Perceptron Gamma Cascade';
    }
}
namespace Cascade
{
    use Perceptron\\Cluster;
    
    class FeatureExtract
    {
        public static function compute() { return (new Cluster)->gamma; }
    }
}
namespace Matrix
{
    function jaNamespace() {
        $s1 = (new Cluster)->gamma;
        $s2 = \\Cascade\\FeatureExtract::compute();
        return "The PHP Artificial Intelligence implements new NLP algorithms: <br> $s1 <br> $s2";
    }
}
NAMESPACE_CODE;
    $namespace_code = htmlentities($namespace_code);
    $namespace_output = \Matrix\jaNamespace();
    
    return <<<NAMESPACE_CONTENT
<div id="namespace_code" class="ja-content" layout-padding layout-margin>
    <h2>Namespaces</h2>
    <p>
        I like namespaces because I can use classes with in classes without the <code>use</code> keyword <br>
        However, they can get tricky.
    </p>
    <pre>$namespace_code</pre>
</div>
<br>
<br>
<div id="namespace_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <div>$namespace_output</div>
</div>
NAMESPACE_CONTENT;
}