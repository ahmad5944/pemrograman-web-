
<?php
//node structure
class Node
{
  public $data;
  public $NIM;
  public $Nama;
  public $Prodi;
  public $next;
}

class LinkedList
{
  public $head;

  //constructor to create an empty LinkedList
  public function __construct()
  {
    $this->head = null;
  }
  //Add new element at the end of the list
  public function push_back($newElement)
  {
    $newNode = new Node();
    $newNode->data = $newElement;
    $newNode->next = null;
    if ($this->head == null) {
      $this->head = $newNode;
    } else {
      $temp = new Node();
      $temp = $this->head;
      while ($temp->next != null) {
        $temp = $temp->next;
      }
      $temp->next = $newNode;
    }
  }

  //Delete an element at the given position
  public function pop_at($position)
  {
    if ($position < 1) {
      echo "\nposition should be >= 1.";
    } else if ($position == 1 && $this->head != null) {
      $nodeToDelete = $this->head;
      $this->head = $this->head->next;
      $nodeToDelete = null;
    } else {
      $temp = new Node();
      $temp = $this->head;
      for ($i = 1; $i < $position - 1; $i++) {
        if ($temp != null) {
          $temp = $temp->next;
        }
      }
      if ($temp != null && $temp->next != null) {
        $nodeToDelete = $temp->next;
        $temp->next = $temp->next->next;
        $nodeToDelete = null;
      } else {
        echo "\nThe node is already null.";
      }
    }
  }


  //display the content of the list
  public function PrintList()
  {
    $temp = new Node();
    $temp = $this->head;
    if ($temp != null) {
      echo "The list contains: ";
      while ($temp != null) {
        echo $temp->data . " " . $temp->NIM . " " . $temp->Nama . " " . $temp->Prodi . " ";
        $temp = $temp->next;
      }
      echo "\n";
    } else {
      echo "The list is empty.\n";
    }
  }
};

// test the code  
//create an empty LinkedList
$MyList = new LinkedList();

//Add first node.
$first = new Node();
$first->NIM = 101010;
$first->Nama = "Ahmad Daffa Dhaifullah";
$first->Prodi = "TI";
$first->next = null;
//linking with head node
$MyList->head = $first;

//Add second node.
$second = new Node();
$second->NIM = 101011;
$second->Nama = "Imam Firmansyah";
$second->Prodi = "TI";
//linking with first node
$first->next = $second;

//Add third node.
$third = new Node();
$third->NIM = 101012;
$third->Nama = "Arjuna silalahi";
$third->Prodi = "TI";
$third->next = null;
//linking with second node
$second->next = $third;

//Add fourth node.
$fourth = new Node();
$fourth->NIM = 101013;
$fourth->Nama = "Muntasir";
$fourth->Prodi = "TI";
$fourth->next = null;
//linking with second node
$third->next = $fourth;

//Add third node.
$fifth = new Node();
$fifth->NIM = 101014;
$fifth->Nama = "Ardafa silalahi";
$fifth->Prodi = "TI";
$fifth->next = null;
//linking with second node
$fourth->next = $fifth;

//print the content of list
// delete data kedua
$MyList->pop_at(2);
$MyList->PrintList();

?>
