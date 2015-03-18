<?
namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="blog")
 */
class Blog
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
    protected $cim;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $bevezeto;

    /**
     * @ORM\Column(type="text", nullable=false)
     */	
    protected $bejegyzes;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $szerzo;

	/**
	 * @ORM\Column(type="datetime")
	*/
    protected $keszites_idopontja;


    /**
     * @ORM\OneToMany(targetEntity="Hozzaszolasok", mappedBy="blog")
     * @ORM\OrderBy({"keszites_idopontja" = "desc"})
     **/
    private $hozzaszolasok;

    public function __construct() {
        $this->hozzaszolasok = new ArrayCollection();
    }    

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
     * Set cim
     *
     * @param string $cim
     * @return Blog
     */
    public function setCim($cim)
    {
        $this->cim = $cim;

        return $this;
    }

    /**
     * Get cim
     *
     * @return string 
     */
    public function getCim()
    {
        return $this->cim;
    }

    /**
     * Set bevezeto
     *
     * @param string $bevezeto
     * @return Blog
     */
    public function setBevezeto($bevezeto)
    {
        $this->bevezeto = $bevezeto;

        return $this;
    }

    /**
     * Get bevezeto
     *
     * @return string 
     */
    public function getBevezeto()
    {
        return $this->bevezeto;
    }

    /**
     * Set bejegyzes
     *
     * @param string $bejegyzes
     * @return Blog
     */
    public function setBejegyzes($bejegyzes)
    {
        $this->bejegyzes = $bejegyzes;

        return $this;
    }

    /**
     * Get bejegyzes
     *
     * @return string 
     */
    public function getBejegyzes()
    {
        return $this->bejegyzes;
    }

    /**
     * Set szerzo
     *
     * @param string $szerzo
     * @return Blog
     */
    public function setSzerzo($szerzo)
    {
        $this->szerzo = $szerzo;

        return $this;
    }

    /**
     * Get szerzo
     *
     * @return string 
     */
    public function getSzerzo()
    {
        return $this->szerzo;
    }

    /**
     * Set keszites_idopontja
     *
     * @param \DateTime $keszitesIdopontja
     * @return Blog
     */
    public function setKeszitesIdopontja($keszitesIdopontja)
    {
        $this->keszites_idopontja = $keszitesIdopontja;

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
     * Add hozzaszolasok
     *
     * @param \BlogBundle\Entity\Hozzaszolasok $hozzaszolasok
     * @return Blog
     */
    public function addHozzaszolasok(\BlogBundle\Entity\Hozzaszolasok $hozzaszolasok)
    {
        $this->hozzaszolasok[] = $hozzaszolasok;

        return $this;
    }

    /**
     * Remove hozzaszolasok
     *
     * @param \BlogBundle\Entity\Hozzaszolasok $hozzaszolasok
     */
    public function removeHozzaszolasok(\BlogBundle\Entity\Hozzaszolasok $hozzaszolasok)
    {
        $this->hozzaszolasok->removeElement($hozzaszolasok);
    }

    /**
     * Get hozzaszolasok
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHozzaszolasok()
    {
        return $this->hozzaszolasok;
    }
}
