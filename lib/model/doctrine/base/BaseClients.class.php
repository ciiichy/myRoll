<?php

/**
 * BaseClients
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property string $address
 * @property string $nip
 * @property string $regon
 * @property string $email
 * @property string $tel
 * @property Doctrine_Collection $Contracts
 * 
 * @method string              getName()      Returns the current record's "name" value
 * @method string              getAddress()   Returns the current record's "address" value
 * @method string              getNip()       Returns the current record's "nip" value
 * @method string              getRegon()     Returns the current record's "regon" value
 * @method string              getEmail()     Returns the current record's "email" value
 * @method string              getTel()       Returns the current record's "tel" value
 * @method Doctrine_Collection getContracts() Returns the current record's "Contracts" collection
 * @method Clients             setName()      Sets the current record's "name" value
 * @method Clients             setAddress()   Sets the current record's "address" value
 * @method Clients             setNip()       Sets the current record's "nip" value
 * @method Clients             setRegon()     Sets the current record's "regon" value
 * @method Clients             setEmail()     Sets the current record's "email" value
 * @method Clients             setTel()       Sets the current record's "tel" value
 * @method Clients             setContracts() Sets the current record's "Contracts" collection
 * 
 * @package    roLL
 * @subpackage model
 * @author     Piotr Cichocki
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClients extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('clients');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('nip', 'string', 31, array(
             'type' => 'string',
             'length' => 31,
             ));
        $this->hasColumn('regon', 'string', 15, array(
             'type' => 'string',
             'length' => 15,
             ));
        $this->hasColumn('email', 'string', 127, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 127,
             ));
        $this->hasColumn('tel', 'string', 63, array(
             'type' => 'string',
             'length' => 63,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Contracts', array(
             'local' => 'id',
             'foreign' => 'client_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}