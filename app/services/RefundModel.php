<?php 

class RefundModel {

    private $lottery_id;
    private $betid;

    public function __construct($lottery_id,$betid){
        $this->lottery_id = $lottery_id;
        $this->betid = $betid;
        if($this->updateBetStatus() == 'success'){
            if($this->updateUserBalance() == 'success'){
                echo json_encode(['status'=>'success','message'=>'Refund Successful']);
            }else{
                echo json_encode(['status'=>'error','message'=>'Refund Failed']);
            }
        }
    }

    public function getBetTable(){
        return GameTableMap::getGameTableMap()[$this->lottery_id]['bet_table'];
    }

    public function getBetAmount(){
        $sql = "SELECT bet_amount FROM ".$this->getBetTable()." WHERE bid = :bid";
        return (new Helper)->selectOne($sql, ['bid'=>$this->betid])->bet_amount;
    }

    public function getUserId(){
        $sql = "SELECT uid FROM ".$this->getBetTable()." WHERE bid = :bid";
        return (new Helper)->selectOne($sql, ['bid'=>$this->betid])->uid;
    }

    public function getUserBalance(){
        $sql = "SELECT balance FROM users WHERE uid = :uid";
        return (new Helper)->selectOne($sql, ['uid'=>$this->getUserId()])->balance;
    }

    public function getUserNewbalance(){
        return $this->getuserbalance() + $this->getBetAmount();
    }

    public function updateUserBalance(){
        $sql = "UPDATE users SET balance = :balance WHERE uid = :uid";
        return (new Helper)->update($sql, ['balance'=>$this->getUserNewBalance(),'uid'=>$this->getUserId()]);
    }

    public function updateBetStatus(){
        $sql = "UPDATE ".$this->getBetTable()." SET state = :state, bet_status = :bet_status WHERE bid = :bid";
        return (new Helper)->update($sql, ['state' => 4,'bet_status' => 6,'bid'=>$this->betid]);
    }

}