<?php
//...
use Doctrine\Common\Collections\ArrayCollection;

class Tag
{
    // ...

    /**
     * @ORM\ManyToMany(targetEntity="\Application\Entity\Post", mappedBy="tags")
     */
    protected $posts;

    // Constructor.
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    // Returns posts associated with this tag.
    public function getPosts()
    {
        return $this->posts;
    }

    // Adds a post into collection of posts related to this tag.
    public function addPost($post)
    {
        $this->posts[] = $post;
    }
}