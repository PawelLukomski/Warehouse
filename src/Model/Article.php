<?php

namespace Model;


class Article
{
    public $id;

    public $name;

    public $start_amount;

    public $add_date;

    public $contractor_id;

    public $unit;

    public $minimum;

    public $category;

    public $type;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getStartAmount()
    {
        return $this->start_amount;
    }

    /**
     * @param float $start_amount
     */
    public function setStartAmount($start_amount)
    {
        $this->start_amount = $start_amount;
    }

    /**
     * @return mixed
     */
    public function getAddDate()
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * @return mixed
     */
    public function getContractorId()
    {
        return $this->contractor_id;
    }

    /**
     * @param mixed $contractor_id
     */
    public function setContractorId($contractor_id)
    {
        $this->contractor_id = $contractor_id;
    }

    /**
     * @return mixed
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param mixed $unit
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;
    }

    /**
     * @return float
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * @param float $minimum
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }



}