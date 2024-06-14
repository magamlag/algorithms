class Graph {
    private $adjacencyList;

    public function __construct() {
        $this->adjacencyList = [];
    }

    // Add an edge to the graph
    public function addEdge($start, $end) {
        if (!isset($this->adjacencyList[$start])) {
            $this->adjacencyList[$start] = [];
        }
        if (!isset($this->adjacencyList[$end])) {
            $this->adjacencyList[$end] = [];
        }
        $this->adjacencyList[$start][] = $end;
    }

    // Depth-First Search (DFS) using recursion
    public function depthFirstSearch($start) {
        $visited = [];
        $this->dfsHelper($start, $visited);
    }

    private function dfsHelper($vertex, &$visited) {
        // Mark the current node as visited and print it
        $visited[$vertex] = true;
        echo $vertex . " ";

        // Recur for all the vertices adjacent to this vertex
        if (isset($this->adjacencyList[$vertex])) {
            foreach ($this->adjacencyList[$vertex] as $adjacent) {
                if (!isset($visited[$adjacent])) {
                    $this->dfsHelper($adjacent, $visited);
                }
            }
        }
    }
}
