<?php

class Grade
{
    public $student_id;
    public $course_code;
    public $score;

    public function __construct($id, $code, $score)
    {
        $this->student_id = (int)$id;
        $this->course_code = (int)$code;
        $this->score = (float)$score;
    }
}
//---------------------------------------------------
class CourseUtil
{
    private $file_address;

    public function set_file($address)
    {
        $this->file_address = $address;
    }
    public function load($line_number)
    {
        /*$spl = new SplFileObject($this->file_address);
        $spl->seek($line_number-1);
        $arr = explode(' ',trim($spl->fgets()));*/
        $file=explode("\n",file_get_contents($this->file_address));
        $arr=explode(' ',trim($file[(int)$line_number-1]));
        return new Grade($arr[0],$arr[1],$arr[2]);
    }
    public function save($grade)
    {
        if(file_exists($this->file_address)){
            $file = explode("\n", file_get_contents($this->file_address));
            foreach ($file as $line) {
                $arr = explode(' ', $line);
                if ($arr[0] == $grade->student_id && $arr[1] == $grade->course_code) {
                    return;
                }
            }
        }else{
            file_put_contents($this->file_address,$grade->student_id.' '.$grade->course_code.' '.$grade->score,FILE_APPEND);
            return;
        }
        file_put_contents($this->file_address,"\n".$grade->student_id.' '.$grade->course_code.' '.$grade->score,FILE_APPEND);
    }
    public function calc_course_average($course_code)
    {
        $file=explode("\n",file_get_contents($this->file_address));
        $counter=0;
        $sum=0;
        foreach ($file as $line){
            $arr=explode(' ',$line);
            if($arr[1]==$course_code){
                $counter++;
                $sum+=(float)$arr[2];
            }
        }
        return (float)$sum/$counter;
    }
    public function calc_student_average($student_id)
    {
        $file=explode("\n",file_get_contents($this->file_address));
        $counter=0;
        $sum=0;
        foreach ($file as $line){
            $arr=explode(' ',$line);
            if($arr[0]==$student_id){
                $counter++;
                $sum+=(float)$arr[2];
            }
        }
        return (float)$sum/$counter;
    }
    public function count()
    {
        if(!file_exists($this->file_address))return 0;
        $file=fopen($this->file_address,'r');
        $line_count=0;
        while(!feof($file)){
            $line = fgets($file);
            $line_count++;
        }
        return $line_count;
    }
}

$file_address='sisi.txt';
$util = new CourseUtil();
$util->set_file($file_address);
echo $util->count();

$grade = new Grade(44612, 134, 1);
$util->save($grade);
echo $util->count().'<br>'.'<pre>';
var_dump($util->load(2),$util->load(1));
$grade = new Grade(44412, 1234, 12);
$util->save($grade);
var_dump($util->load(2),$util->load(3));
$gr=$util->load(2);
var_dump($gr->student_id,$gr->course_code,$gr->score);
$util->set_file($file_address);
echo $util->count();
$util = new CourseUtil();
$util->set_file('sisi.txt');
echo $util->calc_course_average('154');
