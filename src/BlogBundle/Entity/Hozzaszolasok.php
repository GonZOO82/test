<?
namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="hozzaszolasok")
 */
class Hozzaszolasok
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $nev;


    /**
     * @ORM\Column(type="text", length=500, nullable=true)
     */
    protected $hozzaszolas;


    /**
     * @ORM\Column(type="datetime")
    */
    protected $keszites_idopontja;
    
    /**
     * @ORM\ManyToOne(targetEntity="Blog", inversedBy="hozzaszolasok")
     * @ORM\JoinColumn(name="blog_id", referencedColumnName="id")
     **/    
    private $blog;

  

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nev
     *
     * @param string $nev
     * @return Hozzaszolasok
     */
    public function setNev($nev)
    {
        $this->nev = $nev;

        return $this;
    }

    /**
     * Get nev
     *
     * @return string 
     */
    public function getNev()
    {
        return $this->nev;
    }

    /**
     * Set hozzaszolas
     *
     * @param string $hozzaszolas
     * @return Hozzaszolasok
     */
    public function setHozzaszolas($hozzaszolas)
    {
        $this->hozzaszolas = $hozzaszolas;

        return $this;
    }

    /**
     * Get hozzaszolas
     *
     * @return string 
     */
    public function getHozzaszolas()
    {
        return $this->hozzaszolas;
    }

    /**
     * Set keszites_idopontja
     *
     * @param \DateTime $keszitesIdopontja
     * @return Hozzaszolasok
     */
    public function setKeszitesIdopontja($keszitesIdopontja)
    {
        //$this->keszites_idopontja = $keszitesIdopontja;
        $this->keszites_idopontja = new \DateTime("now");

        return $this;
    }

    /**
     * Get keszites_idopontja
     *
     * @return \DateTime 
     */
    public function getKeszitesIdopontja()
    {
        return $this->keszites_idopontja;
    }

    /**
     * Set blog
     *
     * @param \BlogBundle\Entity\Blog $blog
     * @return Hozzaszolasok
     */
    public function setBlog(\BlogBundle\Entity\Blog $blog = null)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get blog
     *
     * @return \BlogBundle\Entity\Blog 
     */
    public function getBlog()
    {
        return $this->blog;
    }
}
