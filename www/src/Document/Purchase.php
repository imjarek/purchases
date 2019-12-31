<?php


namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(collection="purchases")
 */
class Purchase
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Field(type="hash")
     */
    protected $items;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $user;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $userInn;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $totalSum;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $retailAdress;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $email;

    /**
     * @MongoDB\Field(type="date")
     */
    protected $date;

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}
