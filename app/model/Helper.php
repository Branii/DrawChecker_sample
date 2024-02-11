<?php 
// require $_SERVER['DOCUMENT_ROOT']. 'includer.php';
    class Helper extends Database {
        
        public function query($sql,$params = []) {
            $req = parent::openLink("testdb")->prepare($sql);
            $req->execute($params);
            parent::closeLink();
            return $req;
        }

        public function selectAll($sql,$params = []) {
            $req = $this->query($sql,$params);
            return $req->fetchAll(PDO::FETCH_OBJ);
        }

        public function selectOne($sql,$params = []) {
            $req = $this->query($sql,$params);
            return $req->fetch(PDO::FETCH_OBJ);
        }

        public function insert($sql,$params = []) {
            $req = $this->query($sql,$params);
            return parent::openLink("testdb")->lastInsertId();
        }

        public function update($sql,$params = []) {
            $req = $this->query($sql,$params);
            return $req->rowCount();
        }

        public function delete($sql,$params = []) {
            $req = $this->query($sql,$params);
            return $req->rowCount();
        }

    }