<?php
namespace ArrayUtils;

class Main
{
    /**
     * 列表转树
     * @param $list
     * @param string $id
     * @param string $pid
     * @param string $child
     * @param int $root
     * @return array
     */
    public static function getTree($list, $id='id', $pid = 'pid', $child = 'children', $root = 0)
    {
        if (!is_array($list)){
            return [];
        }
        $tree = [];
        foreach ($list as $i){
            if ($i[$pid] == $root){
                $i[$child] = self::getTree($list, $id, $pid, $child, $i[$id]);
                $tree[] = $i;
            }
        }
        return $tree;
    }

    /**
     * 树转列表
     * @param $tree
     * @param string $child
     * @param string $prefix
     * @param int $level
     * @param array $list
     * @return array|mixed
     */
    public static function getList($tree, $child = 'children', $prefix = "-", $level = 1, &$list = [])
    {
        if (!is_array($tree)){
            return $list;
        }

        foreach ($tree as $i){
            $i['level'] = $level;
            $i['prefix'] = str_repeat($prefix, $level - 1);

            $data = $i;
            unset($i[$child]);
            $list[] = $i;

            if (isset($data[$child]) && $data[$child]){
                self::getList($data[$child], $child, $prefix, $level + 1, $list);
            }

        }

        return $list;

    }
}