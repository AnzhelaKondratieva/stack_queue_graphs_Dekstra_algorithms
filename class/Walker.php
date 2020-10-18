<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18.10.2020
 * Time: 10:56
 */

class Walker
{
    private $graph;
    public $path;

    public function __construct(Graph $graph)
    {
        $this->graph = $graph;
        $this->path = [];
    }

    public function walkDepth(string $node)
    {
        $this->path[$node] = true;
        foreach($this->graph->getEdges($node) as $node2=>$length) {
            if(!$this->path[$node2]){
                $this->walkDepth($node2);
            }
        }
    }

    public function walk(string $node, Sequence $sequence)
    {
        $path = [];
        $sequence->put($node);
        show($path, $sequence);
        while(!$sequence->isEmpty()) {
            $curr = $sequence->get();
            $path[$curr] = true;
            foreach($this->graph->getEdges($curr) as $next=>$length) {
                if(!$path[$next]) {
                    if(!$sequence->contains($next)) {}
                    $sequence->put($next);
                }
            }
            show($path, $sequence);
        }
        return $path;
    }
}