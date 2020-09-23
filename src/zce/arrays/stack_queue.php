<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/14/2020
 * Time: 7:34 PM
 *
 * "Because thinking of var names is hard"
 * -- short var names --
 * set, rec, dim, per, vec, cep, tro, foo, net, fu, bar, cas, xi, nu, mu, rho, fi, a, b, c, ds, x, y, z, stat
 * -- cool var names --
 * perceptron, metric, nueronet, cascade, cluster, matrix, feature, omicron, sigma, iota, epsilon, gamma, omega,
 * -- combinations --
 * metricSet, cascadeVec, iotaStat, epsilonFoo, featureX, nueronetA, etc.
 */

function jaStackQueue() {
    class SimpleQueue
    {
        private array $queue = [];
        
        public function get() {
            if($this->queue) {
                $reverse = array_reverse($this->queue);
                return array_shift($reverse);
            }
            return null;
        }
    
        public function add($value) {
            array_unshift($this->queue, $value);
        }
    }
    
    class SimpleStack
    {
        private array $stack = [];
    
        public function get() {
            if($this->stack) {
                return array_pop($this->stack);
            }
            return null;
        }
    
        public function add(...$values) {
            array_push($this->stack, ...$values);
        }
    }
    
    $queue = new SimpleQueue;
    $stack = new SimpleStack;
    
    $queue->add('x');
    $queue->add('y');
    $fifo = $queue->get();
    
    $stack->add('perceptron', 'random forrest', 'cross validate');
    $lifo = $stack->get();
    
    $fifo_lifo = [$fifo, $lifo];
    
    return var_export($fifo_lifo, true);
}

$stack_queue_code = <<<'STACK_QUEUE_CODE'
function jaStackQueue() {
    class SimpleQueue
    {
        private array $queue = [];
        
        public function get() {
            if($this->queue) {
                $reverse = array_reverse($this->queue);
                return array_shift($reverse);
            }
            return null;
        }
    
        public function add($value) {
            array_unshift($this->queue, $value);
        }
    }
    
    class SimpleStack
    {
        private array $stack = [];
    
        public function get() {
            if($this->stack) {
                return array_pop($this->stack);
            }
            return null;
        }
    
        public function add(...$values) {
            array_push($this->stack, ...$values);
        }
    }
    
    $queue = new SimpleQueue;
    $stack = new SimpleStack;
    
    $queue->add('x');
    $queue->add('y');
    $fifo = $queue->get();
    
    $stack->add('perceptron', 'random forrest', 'cross validate');
    $lifo = $stack->get();
    
    $fifo_lifo = [$fifo, $lifo];
    
    return var_export($fifo_lifo, true);
}
STACK_QUEUE_CODE;

$stack_queue_output = jaStackQueue();

return <<<ANGULAR_JS_ENGINEER_SKILL_CONTENT
<div id="fs_info_op_code" class="ja-content" layout-padding layout-margin>
    <h2>Basically just appending and prepending ops</h2>
    <p class="ja-personal-experience">
        Personally, I think of stacks and queues as a fancy way to strictly enforce removing <br>
        and adding elements in a particular order. I never found them to be practical for <br>
        business logic. But I'm sure there is a legit super niche use case for them... maybe?
    </p>
    <h5 class="ja-techniques-used">
        In the example, I just use: <br>
        add via push & unshift and get via pop & shift
    </h5>
    
    <!-- Sample code -->
    <pre>$stack_queue_code</pre>
</div>

<br><br>

<div id="fs_resource_output" class="ja-content" flex="60" layout-padding layout-margin>
    <h3>The output from the above code:</h3>

    <!-- Code output -->
    <pre>$stack_queue_output</pre>
</div>
ANGULAR_JS_ENGINEER_SKILL_CONTENT;