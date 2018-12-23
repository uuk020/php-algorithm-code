<?php
namespace SingleLinedList;
require Node.php;
/**
 * 实现单链表
 */
class SingleLinedList
{
    /**
     * 哨兵节点 - 头结点
     *
     * @var Node
     */
    private $head = null;

    /**
     * 链表长度
     */
    private $length;

    /**
     * 初始化单链表
     *
     * @param null $head 头结点
     */
    public function __construct($head = null)
    {
        // 空链表中生成头结点
        if ($head == null) {
            $this->head = new Node();
        } else { // 已有结点生成单链表
            $this->head = $head;
        }
        $this->length = 0;
    }

    /**
     * 获取链表长度
     *
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     *  采用头插法 生成倒序链表
     *
     * @param  mixed $data
     * @return Node
     */
    public function headInsert($data)
    {
        return $this->insertDataAfter($this->head, $data);
    }

    /**
     * 在某个节点后插入新的节点
     *
     * @param Node  $originNode 要插入节点
     * @param mixed $data       数据
     * @return Node
     */
    public function insertDataAfter(Node $originNode, $data)
    {
        if (empty($originNode)) {
            return false;
        }
        $newNode = new Node();
        $newNode->setData($data);
        /*
         * 将新的节点的后续指针指向要插入的节点的后续指针, 避免指针丢失
         * 若先将 originNode->next = newNode  newNode->next = originNode->next
         * 等同于 newNode->next = originNode->next = newNode 指向newNode
         */
        $newNode->setNext($originNode->getNext());
        $originNode->setNext($newNode);
        $this->length++;
        return $newNode;
    }

    /**
     * 在某个节点前插入新的节点
     *
     * @param Node  $originNode
     * @param mixed $data
     * @return void
     */
    public function insertDataBefore(Node $originNode, $data)
    {
        if (empty($originNode)) {
            return false;
        }
        $preNode = $this->getPreNode($originNode);
        return $this->insertDataAfter($preNode, $data);
    }

    /**
     * 获取某个节点的前置节点
     *
     * @param Node $node
     * @return void
     */
    public function getPreNode(Node $node)
    {
        if (empty($node)) {
            return false;
        }
        $curNode = $this->head;
        $preNode = $this->head;

        while ($curNode !== $node && $curNode != null) {
            $preNode = $curNode;
            $curNode = $curNode->next;
        }
        return $preNode;
    }

    /**
     * 在某个节点后插入新的节点
     *
     * @param Node $originNode
     * @param Node $newNode
     * @return void
     */
    public function insertNodeAfter(Node $originNode, Node $newNode)
    {
        if (empty($originNode)) {
            return false;
        }
        $newNode->setNext($originNode->getNext());
        $originNode->setNext($newNode);
        $this->length++;
        return true;
    }

    /**
     * 打印链表
     *
     * @return void
     */
    public function printList()
    {
        if (null === $this->head->getNext()) {
            return false;
        }
        $curNode = $this->head;
        $len = $this->length;
        while ($curNode->getNext() !== null && $len--) {
            echo $curNode->getNext()->getData() . '-> ';
            $curNode = $curNode->getNext();
        }
        echo 'NULL' . PHP_EOL;
        return true;
    }

    /**
     * 删除结点
     *
     * @param Node $node
     * @return void
     */
    public function delete(Node $node)
    {
        if (empty($node)) {
            return false;
        }
        $preNode = $this->getPreNode($node);
        $preNode->setNext($node->getNext());
        unset($node);
        $this->length--;
        return true;
    }
}