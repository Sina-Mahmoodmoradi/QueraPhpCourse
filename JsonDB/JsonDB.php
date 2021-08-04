<?php


class JsonDB
{
    private $dir;

    public function __construct($dir='')
    {
        $this->dir =$dir;
    }
    private function JsonToArray($table_name)
    {
        $dir = $this->dir === '' ? '' : $this->dir.'/';
        if(!file_exists($dir.$table_name.'.json'))throw new Exception("Table $table_name not found");
        $table = json_decode(file_get_contents($dir.$table_name.'.json'),true);
        if(!isset($table['schema']))throw new Exception("Table $table_name not found");
        return $table;
    }
    private function arrayToJason($arr,$table_name)
    {
        $dir = $this->dir === '' ? '' : $this->dir.'/';
        file_put_contents($dir.$table_name.'.json',json_encode($arr));
    }
    public function insert($table_name,$arr)
    {
        $table = $this->JsonToArray($table_name);
        $index = (int)array_key_last($table['data']) + 1;
        foreach ($table['schema'] as $key => $value) {
            if (!empty($arr[$key])) {
                $table['data']['index'][$key] = $arr[$key];
            } elseif (isset($value['default'])) {
                $table['data']['index'][$key] = $value['default'];
            } elseif ($value['nullable']) {
                $table['data']['index'][$key] = null;
            } else {
                throw new Exception('No value provided for column ' . $key);
            }
        }
        foreach ($arr as $key => $value) {
            if (!isset($table['schema'][$key])) throw new Exception('Column ' . $key . ' not found');
        }
        $table['data'] =array_values($table['data']);
        $this->arrayToJason($table, $table_name);
    }
    public function select($table_name,$arr=[])
    {
        $result=[];
        $table = $this->JsonToArray($table_name);
        foreach($arr as $key => $value){
            if(!isset($table['schema'][$key]))throw new Exception('Column '.$key.' not found');
        }
        if(empty($arr)) {
            return $table['data'];
        }else{
            foreach ($table['data'] as $row){
                $check=true;
                foreach($arr as $key => $value){
                    if($row[$key]!=$value){
                        $check=false;
                        break;
                    }
                }
                if($check) $result[]=$row;
            }
        }
        return $result;
    }
    public function update($table_name,$update,$target=null)
    {
        $table=$this->JsonToArray($table_name);
        foreach($update as $key => $value){
            if(!isset($table['schema'][$key]))throw new Exception('Column '.$key.' not found');
        }
        if($target == null){
            foreach($table['data'] as &$row){
                foreach($update as $key => $value){
                    $row[$key] = $value;
                }
            }
            $this->arrayToJason($table, $table_name);
            return;
        }
        foreach($target as $key => $value){
            if(!isset($table['schema'][$key]))throw new Exception('Column '.$key.' not found');
        }
        foreach($table['data'] as &$row){
            $check=true;
            foreach($target as $key => $value){
                if($row[$key]!=$value){
                    $check=false;
                    break;
                }
            }
            if($check){
                foreach($update as $key => $value){
                    $row[$key]=$value;
                }
            }
        }
        $table['data'] =array_values($table['data']);
        $this->arrayToJason($table, $table_name);
    }
    public function delete($table_name,$arr=null)
    {
        $table=$this->JsonToArray($table_name);
        if($arr==null){
            $table['data']=[];
            $this->arrayToJason($table, $table_name);
            return;
        }
        foreach($arr as $key => $value){
            if(!isset($table['schema'][$key]))throw new Exception('Column '.$key.' not found');
        }
        foreach ($table['data'] as $k => $row){
            $check=true;
            foreach($arr as $key => $value){
                if($row[$key]!=$value){
                    $check=false;
                    break;
                }
            }
            if($check){
                unset($table['data'][$k]);
            }
        }
        $table['data']=array_values($table['data']);
        $this->arrayToJason($table, $table_name);
    }
}
