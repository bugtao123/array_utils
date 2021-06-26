# array_utils
**composer require bugtao/array_utils**
~~~~
use ArrayUtils\Main

    /**
     * 列表转树
     * @param $list 被转列表数据
     * @param string $id 主键字段默认id
     * @param string $pid 外建字段默认pid
     * @param string $child 存放下级字段默认children
     * @param int $root 第一级父id 默认0
     * @return array
     */
    Main::getTree('you list', 'id', 'pid', 'children', 0)
    
    /**
     * 树转列表
     * @param $tree 被转树数据
     * @param string $child 树中存放下级字段
     * @param string $prefix 返回前缀默认‘-’
     * @return array|mixed
     */
    Main::getList($tree, 'children', "-")
~~~~
