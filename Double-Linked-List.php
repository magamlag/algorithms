// Node class for the doubly linked list
class Node {
    public $data;
    public $next;
    public $prev;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
        $this->prev = null;
    }
}

// Doubly Linked List class
class DoublyLinkedList {
    private $head;
    private $tail;

    public function __construct() {
        $this->head = null;
        $this->tail = null;
    }

    // Insert a node at the end of the list
    public function append($data) {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $newNode->prev = $this->tail;
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
    }

    // Insert a node at the beginning of the list
    public function prepend($data) {
        $newNode = new Node($data);

        if ($this->head === null) {
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        }
    }

    // Delete a node with a specific value
    public function delete($data) {
        $current = $this->head;

        while ($current !== null) {
            if ($current->data === $data) {
                if ($current->prev !== null) {
                    $current->prev->next = $current->next;
                } else {
                    $this->head = $current->next;
                }

                if ($current->next !== null) {
                    $current->next->prev = $current->prev;
                } else {
                    $this->tail = $current->prev;
                }

                return;
            }

            $current = $current->next;
        }
    }
}
