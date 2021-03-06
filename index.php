<?php

include 'class/Node.php';
include 'class/Sequence.php';
include 'class/Stack.php';
include 'class/Queue.php';
include 'class/Graph.php';
include 'class/Walker.php';
include 'class/Dekstra.php';

/*Стек*/
$stack = new Stack();
$stack->put("John");
$stack->put("Alex");
$stack->put("Mike");

foreach($stack->getList() as $item) {
    echo $item . "<br>\n";
}

echo $stack->get() . "<br>\n";
echo $stack->get() . "<br>\n";
echo $stack->get() . "<br>\n";

/*Очередь*/
$queue = new Queue();
$queue->put("John");
$queue->put("Alex");
$queue->put("Mike");
echo $queue->get() . "<br>\n";
echo $queue->get() . "<br>\n";
echo $queue->get() . "<br>\n";

/*Графы*/
$graph = new Graph();
/*
for($x=0; $x<=8; $x++) {
    for($y=0; $y<=8; $y++) {
        $graph->addNode("$x$y");
    }
}

for($x=0; $x<=8; $x++) {
    for ($y = 0; $y <= 8; $y++) {
        for($sx = 0; $sx <= 1; $sx++) {
            $sy = 1-$sx;
            if($x + $sx < 8) {
                if($y +$sy < 8) {
                    $graph->addEdge("$x$y", ($x + $sx) . ($y + $sy), 1);
                }
            }
        }
    }
}
$walker = new Walker($graph);
$walker->walk('00', new Queue());
print_r($walker->path);

function show(array $path, Sequence $sequence) {
    for($x=0; $x<8; $x++) {
        for($y=0; $y<8; $y++)
            if($path["$x$y"])
                echo "$x$y ";
            elseif($sequence->contains("$x$y"))
                echo "++ ";
            else
                echo ".. ";
        echo "<br>\n";
    }
    foreach($sequence->getList() as $item)
        echo $item . " ";
    echo "<br>\n";
    readline();
}*/

$graph->addNode("A");
$graph->addNode("B");
$graph->addNode("C");
$graph->addNode("D");
$graph->addNode("E");
$graph->addNode("F");
$graph->addNode("G");

$graph->addEdge('A', 'B', 2);
$graph->addEdge('A', 'C', 3);
$graph->addEdge('A', 'D', 6);
$graph->addEdge('B', 'C', 4);
$graph->addEdge('B', 'E', 9);
$graph->addEdge('C', 'D', 1);
$graph->addEdge('C', 'E', 7);
$graph->addEdge('C', 'E', 6);
$graph->addEdge('D', 'F', 4);
$graph->addEdge('E', 'F', 1);
$graph->addEdge('E', 'G', 5);
$graph->addEdge('F', 'G', 8);

foreach($graph->getNodes() as $node) {
    echo $node . "<br>\n";
}

$node1 = "A";
foreach($graph->getEdges($node1) as $node2=>$length) {
    echo $node1 . "-" . $node2 . " " . $length . "<br>";
}

$dekstra = new Dekstra($graph);
echo $dekstra->getShortestPath("A", "G");
//$walker->walkDepth('C');
/*$walker->walkDepth1('C');
print_r($walker->path);*/