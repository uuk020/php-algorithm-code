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
     * @var [type]
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
     *  插入数据 采用头插法 插入新数据
     *
     * @param  mixed $data
     * @return Node
     */
    public function insert($data)
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
}