<?php
// src/User.php
/**
 * @Entity @Table(name="users")
 */
class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;
    /*
    *@OneToMany(targetEntity="Bug", mappedBy="reporter")
    */
    protected $reportedBugs;
    /*
    *@OneToMany(targetEntity="Bug", mappedBy="engineer")
    */
    protected $assignedBugs;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAssignedBugs()
    {
        return $this->assignedBugs;
    }

    public function getReportedBugs()
    {
        return $this->ReportedBugs;
    }

    
}