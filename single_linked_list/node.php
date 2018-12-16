<?php
namespace SingleLinedList;
/**
 * 链表的结点类
 */
class Node
{
    /**
     * 节点中数据
     *
     * @var null
     */
    private $data = null;
    /**
     * 后继指针
     *
     * @var null
     */
    private $next = null;

    public function __construct($data, $next)
    {
        $this->data = $data;
        $this->next = $next;
    }
    /**
     * 获取节点数据
     *
     * @return void
     */
    public function getData()
    {
        return $this->$data;
    }

    /**
     * 设置节点数据
     *
     * @param mixed $data
     * @return void
     */
    public function setData($data)
    {
        if (empty($data)) throw new \Exception('数据不能为空');
        $this->$data = $data;
    }

    /**
     * 获取后续指针
     *
     * @return void
     */
    public function getNext()
    {
        return $this->next;
    }

    /**
     * 设置后续指针
     *
     * @param  Node $next
     * @return void
     */
    public function setNext($next)
    {
        if (empty($next)) throw new \Exception('下个节点不能为空');
        $this->next = $next;
    }
}



