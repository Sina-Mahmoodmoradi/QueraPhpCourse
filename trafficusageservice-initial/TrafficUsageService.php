<?php

class TrafficUsageService
{
    public $traffic_usage_dao;
    public $traffic_usages;
    private $socialMediaLovers=[];
    private $downloadLovers=[];

    public function __construct($traffic_usage_dao)
    {
        $this->traffic_usage_dao = $traffic_usage_dao;
        $this->traffic_usages = $traffic_usage_dao->loadAll();
    }
    public function socialMediaLovers($year, $month)
    {
        $arr=[];
        foreach ($this->traffic_usages as $TU){
            $date = explode('/',$TU->date);
            if($date[0]==$year && $date[1]==$month){
                if($TU->internal){
                    if(!isset($arr[$TU->user->username])) $arr[$TU->user->username] =0;
                }
                elseif(isset($arr[$TU->user->username])) $arr[$TU->user->username] += $TU->usage;
                else $arr[$TU->user->username] = $TU->usage;
            }
        }
        arsort($arr);
        $count=count($arr);
        $count=$count-(int)(($count)*(0.9));
        $counter=0;
        $result=[];
        foreach($arr as $key=>$user){
            $counter++;
            if($counter>$count){
                break;
            }
            $result[]=$key;
        }
        return $result;
    }
    public function downloadLovers($year, $month)
    {
        $arr=[];
        foreach ($this->traffic_usages as $TU){
            $date = explode('/',$TU->date);
            if($date[0]==$year && $date[1]==$month){
                if($TU->nightly){
                    if(isset($arr[$TU->user->username]))$arr[$TU->user->username][0]+=$TU->usage;
                    else $arr[$TU->user->username]=[$TU->usage,0];
                }else{
                    if(isset($arr[$TU->user->username]))$arr[$TU->user->username][1]+=$TU->usage;
                    else $arr[$TU->user->username]=[0,$TU->usage];
                }
            }
        }
        $result=[];
        foreach ($arr as $key=>$user){
            if($user[0]>$user[1])$result[]=$key;
        }
        return $result;
    }
}
