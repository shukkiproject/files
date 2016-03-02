<?php
// src/Bug.php
/**
 * @Entity(repositoryClass="BugRepository") @Table(name="bugs")
 */
class Bug
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $description;
    /**
     * @Column(type="datetime")
     * @var DateTime
     */
    protected $created;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $status;
    /**
    * @ManyToMany(targetEntity="Product")
    */
    protected $products;
    /**
    * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
    */
    protected $reporter;
    /**
    * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
    */
    protected $engineer;


    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setProducts($products)
    {
        $this->products = $products;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function assignToProducts(Product $products)
    {
        $this->products[] = $products;
    }

    public function setReporter(User $user)
    {
        $this->reporter = $user;
    }

    public function setEngineer(User $user)
    {
        $this->engineer = $user;
    }

}