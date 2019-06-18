<?php

namespace Activity\Model;

use Decision\Model\Organ;
use Doctrine\ORM\Mapping as ORM;
use User\Permissions\Resource\OrganResourceInterface;

/**
 * Activity calendar option model.
 *
 * @ORM\Entity
 */
class ActivityCalendarOption implements OrganResourceInterface
{
    /**
     * ID for the option.
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * Type for the option.
     *
     * @ORM\Column(type="string",nullable=true)
     */
    protected $type;

    /**
     * Status for the option.
     *
     * @ORM\Column(type="string",nullable=true)
     */
    protected $status;

    /**
     * The date and time the activity starts.
     *
     * @ORM\Column(type="datetime")
     */
    protected $beginTime;

    /**
     * The date and time the activity ends.
     *
     * @ORM\Column(type="datetime")
     */
    protected $endTime;

    /**
     * To what activity proposal does the option belong
     *
     * @ORM\ManyToOne(targetEntity="Activity\Model\ActivityOptionProposal")
     * @ORM\JoinColumn(referencedColumnName="id",nullable=false)
     */
    protected $proposal;

    /**
     * The date and time the activity option was created.
     *
     * @ORM\Column(type="datetime")
     */
    protected $creationTime;

    /**
     * Who modified this activity option, if null then the option is not modified
     *
     * @ORM\ManyToOne(targetEntity="User\Model\User")
     * @ORM\JoinColumn(referencedColumnName="lidnr",nullable=true)
     */
    protected $modifiedBy;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * @param mixed $beginTime
     */
    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    /**
     * @return mixed
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

    /**
     * @param mixed $creationTime
     */
    public function setCreationTime($creationTime)
    {
        $this->creationTime = $creationTime;
    }

    /**
     * @return mixed
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * @param mixed $modifiedBy
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the string identifier of the Resource
     *
     * @return string
     */
    public function getResourceId()
    {
        return $this->getId();
    }
}
