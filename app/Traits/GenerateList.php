<?php

namespace App\Traits;

use App\Models\Model;

trait GenerateList {
    public function table_to_list($table_name, $key = null, $value = null, $where=[], $pre_value=[]):array
    {
        $this->model = new Model();
        $data_array = $this->model->table($table_name)->select("$key,$value");
        if (is_array($where) && is_array($where))
            $data_array->where($where);

        return $this->array_to_list($data_array, $key, $value, $pre_value);
    }

    public function array_to_list($data_array, $key = null, $value = null, $pre_value=[]):array
    {

        $list = []; // $list = ['' => '-- Select --'];
        if (is_array($pre_value) && $pre_value) {
            $list = [
                array_shift($pre_value) => array_shift($pre_value)
            ];
        }

        return ($list+$this->traverse_list($data_array, $key, $value));
    }

    private function traverse_list($data_array,$key = null, $value = null): array
    {
        $list = [];
        foreach ($data_array as $item) {
            $list[$item->${'key'}] = $item->${'value'};
        }

        return $list;
    }
}