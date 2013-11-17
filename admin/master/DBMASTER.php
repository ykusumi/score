<?php
//ローカル
if ($_SERVER['SERVER_NAME']=='127.0.0.1') {//ローカルホスト 
	require_once('../../../../../Zend/Db.php');
	require_once('../../../../../Zend/Log.php');
	require_once('../../../../../Zend/Log/Writer/Stream.php');
}else{
	
	require_once('../Zend/Db.php');
	require_once('../Zend/Log.php');
	//require_once('../Zend/Log/Writer/Stream.php');
}


class DBMASTER extends Zend_Db {

  var $db;
  var $count;
  var $dbtbl;
  var $select;
  var $_log;
// ローカル localhost
// サーバ　mysql002.phy.lolipop.lan

  function __construct($dbtbl, $schema=""){
	// DB設定情報を読み込みます
if ($_SERVER['SERVER_NAME']=='127.0.0.1') {//ローカルホスト 
        $params = array ('host'     => 'localhost',
                         'username' => USER,
                         'password' => PASSWORD,
                         'dbname'   => HOST);
}else{ 
        $params = array ('host'     => 'mysql002.phy.lolipop.lan',
                         'username' => USER,
                         'password' => PASSWORD,
                         'dbname'   => HOST);
}
            $params['driver_options'] = array(
                'i5_commit' => DB2_I5_TXN_READ_COMMITTED,
                'i5_naming' => DB2_I5_NAMING_ON
            );

        // データベースに接続します
        $this->db = parent::factory('pdo_mysql', $params);
        $this->db->getConnection();
        /*
        if ($schema) {
            $this->db->query('SET CURRENT SCHEMA ' . $schema);
        } else {
            $this->db->query('SET CURRENT SCHEMA ' . LIBRARY);
        }
        */
        $this->dbtbl = $dbtbl;

        // ログを指定する
        /*
        $stream = new Zend_Log_Writer_Stream(ROOT_PATH . '/sqllog/' . date('Ymd') . '.log');
        $this->_log = new Zend_Log();
        $this->_log->addWriter($stream);
        
        //　各ログのフィルタを設定
        $stream->addFilter(Zend_Log::DEBUG,"==");
        */
  }


  public function getList($wheres, $order="", $target="", $limit="", $option="")
  {
      try {
          $this->select = $this->db->select();
          if($target) {
              $this->select->from($this->dbtbl,$target);
          } else {
              $this->select->from($this->dbtbl);
          }
          if(is_array($wheres)) {
              foreach ($wheres as $key => $value) {
                  $this->select->where($key, $value);
              }
          }
          if($order) $this->select->order($order);
          if($limit) {
              if(is_array($limit)) {
                  $this->select->limit($limit[0],$limit[1]);
              } else {
                  $this->select->limit($limit);
              }
          }
          //echo $this->select->__toString();
          $stmt = $this->select->query();
          $result = $stmt->fetchAll();
          $this->count = count($result);
          if($option) {
              foreach ($result as $value) {
                  $data[$value[$option[0]]] = $value[$option[1]];
              }
              return $data;
          }
          return $result;
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . ' SQL::' . $this->select->__toString());
          throw new Exception($e);
      }
  }

  public function setSelect($wheres, $order="", $target="", $limit="", $option="", $orWheres="")
  {
      $this->select = $this->db->select();
      if($target) {
          $this->select->from($this->dbtbl,$target);
      } else {
          $this->select->from($this->dbtbl);
      }
      if(is_array($wheres)) {
          foreach ($wheres as $key => $value) {
              $this->select->where($key, $value);
          }
      }
      if($order) $this->select->order($order);
      if($limit) {
          if(is_array($limit)) {
              $this->select->limit($limit[0],$limit[1]);
          } else {
              $this->select->limit($limit);
          }
      }
      if(is_array($orWheres)) {
          foreach ($orWheres as $key => $value) {
              $this->select->orWhere($key, $value);
          }
      }
      return $this->select;
  }

  public function insert($target)
  {
      try {
          $target = $this->kataFunc($target);
          $res = $this->db->insert($this->dbtbl,$target);
          return $res;
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . ' Insert::table=' . $this->dbtbl . ',target=' . print_r($target,TRUE));
          throw new Exception($e);
      }
  }

  public function update($target, $where)
  {
      try {
          $target = $this->kataFunc($target);
          return $this->db->update($this->dbtbl,$target,$where);
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . ' Update::table=' . $this->dbtbl . ',target=' . print_r($target,TRUE) . ',where=' . print_r($where, TRUE));
          throw new Exception($e);
      }
  }
  public function delete($where)
  {
        try {
          return $this->db->delete($this->dbtbl,$where);
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . ' Delete::table=' . $this->dbtbl .  ',where=' . print_r($where, TRUE));
          throw new Exception($e);
      }

  }

  public function union($sql1, $sql2)
  {
      $this->select = $this->db->select();
      $this->select->union(array($sql1, $sql2));
      return $this->select;
  }

  public function exequery($sql)
  {
      try {
          $this->db->query($sql);
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . ' SQL::' . $sql);
          throw new Exception($e);
      }
  }

  public function setSql($sql)
  {
      try {
          $stmt = $this->db->query($sql);
          return $stmt;
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . ' SQL::' . $sql);
          throw new Exception($e);
      }
  }

  public function getSelect()
  {
      return $this->select;
  }

  public function fetchAll($str = '')
  {
      try {
          if(!$str)$str = $this->select->__toString();
          $result = $this->db->fetchAll($str);
          $this->count = count($result);
          return $result;
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . ' SQL::' . $this->select->__toString());
          throw new Exception($e);
      }
  }

  public function fetchAllTrim($str = '')
  {
      try {
          if(!$str)$str = $this->select->__toString();
          $stmt = $this->db->query($str);
          while($data = $stmt->fetch()) {
              $result[] = array_map("trim", $data);
          }
          $this->count = count($result);
          return $result;
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . ' SQL::' . $this->select->__toString());
          throw new Exception($e);
      }
  }

  public function getCount()
  {
      return $this->count;
  }

  public function setDBTable($tbl)
  {
      $this->dbtbl = $tbl;
  }

  public function getDBTable()
  {
      return $this->dbtbl;
  }

  public function beginTransaction()
  {
      $this->db->beginTransaction();
  }

  public function rollBack()
  {
      $this->db->rollBack();
  }

  public function commit()
  {
      return $this->db->commit();
  }

  public function fetchOne($str = '')
  {
      try {
          if(!$str)$str = $this->select->__toString();
          return $this->db->fetchOne($str);
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . ' SQL::' . $str);
          throw new Exception($e);
      }

  }

  public function fetchRow($str = '')
  {
      try {
          if(!$str)$str = $this->select->__toString();
          return $this->db->fetchRow($str);
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . ' SQL::' . $str);
          throw new Exception($e);
      }

  }

  public function insertSelect($select, $fields = array()) {
    
    try {
        $fieldString = '';
            if (count($fields))
            {
                foreach($fields as $fieldKey => $field)
                {
                    $fields[$fieldKey] =  $this->db->quoteIdentifier($field);
                }

                $fieldString = ' (' . implode(',', $fields) . ')';
            }

            $query  = "INSERT INTO ".$this->db->quoteIdentifier($this->dbtbl) .
            $fieldString . " ";
            $query .= $select;

            $res = $this->db->query($query);
          return $res;
      } catch (exception $e) {
          $this->_log->err($e->getMessage() . 'SQL=' . $query );
          throw new Exception($e);
      }
  }

  private function kataFunc($array)
  {
      if(is_array($array)) {
          foreach ($array as $key => $value) {
              $array[$key] = $this->kataFunc($value);
          }
          return $array;
      } else {
          if ($array == '' && !is_int($array)) {
              $array = ' ';
          }
          return $array;
      }
  }
  public function close()
  {
      return $this->db->closeConnection();
  }
}
?>