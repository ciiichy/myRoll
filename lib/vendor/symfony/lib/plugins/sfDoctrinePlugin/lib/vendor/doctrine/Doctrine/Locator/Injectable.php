<?php
/**
 *  $Id$
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

/**
 * Doctrine_Locator_Injectable
 *
 * @package     Doctrine
 * @subpackage  Doctrine_Locator
 * @category    Locator
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL
 * @link        http://www.doctrine-project.org
 * @author      Janne Vanhala <jpvanhal@cc.hut.fi>
 * @author      Konsta Vesterinen <kvesteri@cc.hut.fi>
 * @author      Eevert Saukkokoski <dmnEe0@gmail.com>
 * @version     $Revision$
 * @since       1.0
 */

 
if(!function_exists('get_called_class')) {
	function get_called_class($bt = false,$l = 1) {
		if (!$bt) $bt = debug_backtrace();
		if (!isset($bt[$l])) throw new Exception("Cannot find called class -> stack level too deep.");
		if (!isset($bt[$l]['type'])) {
			throw new Exception ('type not set');
		}
		else switch ($bt[$l]['type']) {
			case '::':
				$lines = file($bt[$l]['file']);
				$i = 0;
				$callerLine = '';
				do {
					$i++;
					$callerLine = $lines[$bt[$l]['line']-$i] . $callerLine;
				} while (stripos($callerLine,$bt[$l]['function']) === false);
				preg_match('/([a-zA-Z0-9\_]+)::'.$bt[$l]['function'].'/',
				$callerLine,
				$matches);
				if (!isset($matches[1])) {
					// must be an edge case.
					throw new Exception ("Could not find caller class: originating method call is obscured.");
				}
				switch ($matches[1]) {
					case 'self':
					case 'parent':
						return get_called_class($bt,$l+1);
					default:
						return $matches[1];
				}
				// won't get here.
			case '->': switch ($bt[$l]['function']) {
				case '__get':
					// edge case -> get class of calling object
					if (!is_object($bt[$l]['object'])) throw new Exception ("Edge case fail. __get called on non object.");
					return get_class($bt[$l]['object']);
				default: return $bt[$l]['class'];
			}

			default: throw new Exception ("Unknown backtrace method type");
		}
	}
}

class myTable{
		
		
	function getLink(){
		return false;
	}

	static function addRow($data){
		$name = strtolower(get_called_class());
		$row = new $name();
		$row -> fromArray($data);
		$row -> save();

			
		if (isset($row->id))
		return $row -> id;
			
		if (isset($row->idendyfikator))
		return $row -> idendyfikator;

	}

	static function editRow($key, $data){
		$name = strtolower(get_called_class());
		$row = Doctrine::getTable($name)->find($key);
		$row -> fromArray($data);
		$row -> save();
	}


	static function existKey($key){
		$name = strtolower(get_called_class());
		return Doctrine::getTable($name)->find($key);

	}

	static function existRowByName($col,$val){
		$name = strtolower(get_called_class());
		return Doctrine_Query::CREATE()
		->from($name." c")
		->where("c.$col = ?",$val)
		->count();
	}

	static function getPart($offset,$limit,$sort, $desc = 'asc'){
		$name = strtolower(get_called_class());
		$rows = Doctrine_Query::CREATE()
		->from($name." c");
			
		$amount = $rows->count();
		$rows = $rows->offset($offset)
		->limit($limit);
		
		if (is_array($sort)){
			$rows = $rows->orderBy('c.'.$sort[0].' '.$desc[0].',c.'.$sort[1].' '.$desc[1]);
		}else{
			$rows = $rows->orderBy('c.'.$sort.' '.$desc);
		}
		
		$rows = $rows->execute();

		return array('amount' => $amount, 'rows' => $rows);
	}



	static function deleteRowsByCol($col,$val){
		$name = strtolower(get_called_class());
		Doctrine_Query::CREATE()
		->delete()
		->from($name." c")
		->where("c.$col = ?",$val)
		->execute();
	}


	static function searchRows($phrase,$col,$offset=0,$limit=9999,$sort){
		$name = strtolower(get_called_class());
		$phrase = mb_convert_case($phrase, MB_CASE_UPPER, "UTF-8");
		$rows = Doctrine_Query::CREATE()
		->from($name." c")
		->where("UPPER(c.$col) like '%".$phrase."%'");
			
			
		$amount = $rows->count();
		$rows = $rows->offset($offset)
		->limit($limit)
		->orderBy('c.'.$sort)
		->execute();

		return array('amount' => $amount, 'rows' => $rows);
			


	}


	static function changeValue($key,$pos,$value){
		$name = strtolower(get_called_class());
		$row =  Doctrine::getTable($name)->find($key);
		$row -> $pos = $value;
		$row -> save();
	}


	static function getRow($key){
		$name = strtolower(get_called_class());
		return Doctrine::getTable($name)->find($key);
	}

	static function deleteRow($key){
		$name = strtolower(get_called_class());
		Doctrine::getTable($name)->find($key)->delete();
	}

	static function getAll($sort = false, $select='*'){
		$name = strtolower(get_called_class());
		if (!$sort)
		return Doctrine_Query::CREATE()->from($name)->execute();
		else{
			return Doctrine_Query::CREATE()
			->select($select)
			->from($name)
			->orderBy($sort)
			->execute();
		}
	}

	static function getRandRow($num = 1){
		$name = strtolower(get_called_class());
		$rows = Doctrine_Query::CREATE()
		->select('c.*, RANDOM() as rand')
		->from($name." c")
		->orderBy('rand')
		->limit($num)
		->execute();
			
			
		if ($num == 1)
		return $rows[0];
		else
		return $rows;

	}


	static function getRowByName($col,$value,$sort = 'id'){
		$name = strtolower(get_called_class());
		$rows = Doctrine_Query::CREATE()
		->from($name." c")
		->where("c.$col = ?",$value)
		->orderBy("c.$sort");


			
		return $rows->execute();
	}

	static function getAmount(){
		$name = strtolower(get_called_class());
		$rows = Doctrine_Query::CREATE()
		->select ('count(*) as sum')
		->from($name." c")
		->fetchOne();
			
		return $rows['sum'];
			
	}

	static function getAmountFiltr($col,$val){
		$name = strtolower(get_called_class());
		$rows = Doctrine_Query::CREATE()
		->select ('count(*) as sum')
		->from($name." c")
		->where("c.$col = ?",$val)
		->fetchOne();
			
		return $rows['sum'];
			
	}
	
	
	static function searchByCols($phrase,$cols,$sort = 'id'){
		$phrase = mb_convert_case($phrase, MB_CASE_UPPER, "UTF-8");
		$name = strtolower(get_called_class());
		$rows = Doctrine_Query::CREATE()
		->from($name." c");
			
		foreach ($cols as $col){
			$rows = $rows->orWhere("UPPER(c.$col) like '%".$phrase."%'");
		}
			
		return $rows->orderBy("c.$sort")->execute();
	}

	static function getRowsFromArray($data, $sort='id desc'){
		$name = strtolower(get_called_class());
		$rows = Doctrine_Query::CREATE()
		->from($name." c");
			
		foreach ($data as $k=>$v){
			$rows = $rows->andWhere("c.$k = ?",$v);
		}
			
		return $rows->orderBy("c.$sort")->execute();

	}


	static function toDown($id){
		$name = strtolower(get_called_class());
		
		$f1 = self::getRow($id);
		$f2 = Doctrine::getTable($name)->findByPosition($f1->position+1);
		$f2 = $f2[0];
		//
		$f1 -> position ++;
		$f2 -> position --;
		//
		$f1 -> save();
		$f2 -> save();
		//
	}

	static function toUp($id){
		$name = strtolower(get_called_class());
		
		$f1 = self::getRow($id);
		$f2 = Doctrine::getTable($name)->findByPosition($f1->position-1);
		$f2 = $f2[0];
		//
		$f1 -> position --;
		$f2 -> position ++;
		//
		$f1 -> save();
		$f2 -> save();
		//
	}


}


class Doctrine_Locator_Injectable extends myTable
{
    /**
     * @var Doctrine_Locator      the locator object
     */
    protected $_locator;

    /**
     * @var array               an array of bound resources
     */
    protected $_resources = array();

    /**
     * @var Doctrine_Null $null     Doctrine_Null object, used for extremely fast null value checking
     */
    protected static $_null;

    /**
     * setLocator
     * this method can be used for setting the locator object locally
     *
     * @param Doctrine_Locator                the locator object
     * @return Doctrine_Locator_Injectable    this instance
     */
    public function setLocator(Doctrine_Locator $locator)
    {
        $this->_locator = $locator;
        return $this;
    }

    /**
     * getLocator
     * returns the locator associated with this object
     * 
     * if there are no locator locally associated then
     * this method tries to fetch the current global locator
     *
     * @return Doctrine_Locator
     */
    public function getLocator()
    {
        if ( ! isset($this->_locator)) {
            $this->_locator = Doctrine_Locator::instance();

        }
        return $this->_locator;
    }

    /**
     * locate
     * locates a resource by given name and returns it
     *
     * if the resource cannot be found locally this method tries
     * to use the global locator for finding the resource
     *
     * @see Doctrine_Locator::locate()
     * @throws Doctrine_Locator_Exception     if the resource could not be found
     * @param string $name                  the name of the resource
     * @return mixed                        the located resource
     */
    public function locate($name)
    {
        if (isset($this->_resources[$name])) {
            if (is_object($this->_resources[$name])) {
                return $this->_resources[$name];
            } else {
                // get the name of the concrete implementation
                $concreteImpl = $this->_resources[$name];
                
                return $this->getLocator()->locate($concreteImpl);
            }
        } else {
            return $this->getLocator()->locate($name);
        }
    }

    /**
     * bind
     * binds a resource to a name
     *
     * @param string $name      the name of the resource to bind
     * @param mixed $value      the value of the resource
     * @return Doctrine_Locator   this object
     */
    public function bind($name, $resource)
    {
        $this->_resources[$name] = $resource;
        
        return $this;    
    }

    /**
     * initNullObject
     * initializes the null object
     *
     * @param Doctrine_Null $null
     * @return void
     */
    public static function initNullObject(Doctrine_Null $null)
    {
        self::$_null = $null;
    }

    /**
     * getNullObject
     * returns the null object associated with this object
     *
     * @return Doctrine_Null
     */
    public static function getNullObject()
    {
        return self::$_null;
    }
}