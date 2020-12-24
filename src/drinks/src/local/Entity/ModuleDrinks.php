<?php

namespace Lotgd\Local\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Drinks.
 *
 * @ORM\Table
 * @ORM\Entity
 */
class ModuleDrinks
{
    /**
     * @var int
     *
     * @ORM\Column(type="smallint", nullable=false, options={"unsigned": true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=25, nullable=false)
     */
    private $name = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="costperlevel", type="integer", nullable=false, options={"unsigned": true})
     */
    private $costperlevel = 0;

    /**
     * @var bool
     *
     * @ORM\Column(name="hpchance", type="boolean", nullable=false)
     */
    private $hpchance = 0;

    /**
     * @var bool
     *
     * @ORM\Column(name="turnchance", type="boolean", nullable=false)
     */
    private $turnchance = 0;

    /**
     * @var bool
     *
     * @ORM\Column(name="alwayshp", type="boolean", nullable=false)
     */
    private $alwayshp = 0;

    /**
     * @var bool
     *
     * @ORM\Column(name="alwaysturn", type="boolean", nullable=false)
     */
    private $alwaysturn = 0;

    /**
     * @var bool
     *
     * @ORM\Column(name="drunkeness", type="boolean", nullable=false)
     */
    private $drunkeness = 0;

    /**
     * @var bool
     *
     * @ORM\Column(name="harddrink", type="boolean", nullable=false)
     */
    private $harddrink = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="hpmin", type="smallint", nullable=false)
     */
    private $hpmin = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="hpmax", type="smallint", nullable=false)
     */
    private $hpmax = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="hppercent", type="smallint", nullable=false)
     */
    private $hppercent = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="turnmin", type="smallint", nullable=false)
     */
    private $turnmin = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="turnmax", type="smallint", nullable=false)
     */
    private $turnmax = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="buffname", type="string", length=50, nullable=false)
     */
    private $buffname = '';

    /**
     * @var bool
     *
     * @ORM\Column(name="buffrounds", type="smallint", nullable=false)
     */
    private $buffrounds = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="buffroundmsg", type="string", length=75, nullable=false)
     */
    private $buffroundmsg = '';

    /**
     * @var string
     *
     * @ORM\Column(name="buffwearoff", type="string", length=75, nullable=false)
     */
    private $buffwearoff = '';

    /**
     * @var string
     *
     * @ORM\Column(name="buffatkmod", type="decimal", precision=4, scale=2, nullable=true, options={"unsigned": true})
     */
    private $buffatkmod;

    /**
     * @var string
     *
     * @ORM\Column(name="buffdefmod", type="decimal", precision=4, scale=2, nullable=true, options={"unsigned": true})
     */
    private $buffdefmod;

    /**
     * @var string
     *
     * @ORM\Column(name="buffdmgmod", type="decimal", precision=4, scale=2, nullable=true, options={"unsigned": true})
     */
    private $buffdmgmod;

    /**
     * @var string
     *
     * @ORM\Column(name="buffdmgshield", type="decimal", precision=4, scale=2, nullable=true, options={"unsigned": true})
     */
    private $buffdmgshield;

    /**
     * @var string
     *
     * @ORM\Column(name="buffeffectfailmsg", type="string", length=255, nullable=false)
     */
    private $buffeffectfailmsg = '';

    /**
     * @var string
     *
     * @ORM\Column(name="buffeffectnodmgmsg", type="string", length=255, nullable=false)
     */
    private $buffeffectnodmgmsg = '';

    /**
     * @var string
     *
     * @ORM\Column(name="buffeffectmsg", type="string", length=255, nullable=false)
     */
    private $buffeffectmsg = '';

    /**
     * Set the value of id.
     *
     * @param int id
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of Name.
     *
     * @param string name
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of Active.
     *
     * @param bool active
     * @param mixed $active
     *
     * @return self
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of Active.
     */
    public function getActive(): bool
    {
        return $this->active;
    }

    /**
     * Set the value of Costperlevel.
     *
     * @param int costperlevel
     * @param mixed $costperlevel
     *
     * @return self
     */
    public function setCostperlevel($costperlevel)
    {
        $this->costperlevel = $costperlevel;

        return $this;
    }

    /**
     * Get the value of Costperlevel.
     */
    public function getCostperlevel(): int
    {
        return $this->costperlevel;
    }

    /**
     * Set the value of Hpchance.
     *
     * @param bool hpchance
     * @param mixed $hpchance
     *
     * @return self
     */
    public function setHpchance($hpchance)
    {
        $this->hpchance = $hpchance;

        return $this;
    }

    /**
     * Get the value of Hpchance.
     */
    public function getHpchance(): bool
    {
        return $this->hpchance;
    }

    /**
     * Set the value of Turnchance.
     *
     * @param bool turnchance
     * @param mixed $turnchance
     *
     * @return self
     */
    public function setTurnchance($turnchance)
    {
        $this->turnchance = $turnchance;

        return $this;
    }

    /**
     * Get the value of Turnchance.
     */
    public function getTurnchance(): bool
    {
        return $this->turnchance;
    }

    /**
     * Set the value of Alwayshp.
     *
     * @param bool alwayshp
     * @param mixed $alwayshp
     *
     * @return self
     */
    public function setAlwayshp($alwayshp)
    {
        $this->alwayshp = $alwayshp;

        return $this;
    }

    /**
     * Get the value of Alwayshp.
     */
    public function getAlwayshp(): bool
    {
        return $this->alwayshp;
    }

    /**
     * Set the value of Alwaysturn.
     *
     * @param bool alwaysturn
     * @param mixed $alwaysturn
     *
     * @return self
     */
    public function setAlwaysturn($alwaysturn)
    {
        $this->alwaysturn = $alwaysturn;

        return $this;
    }

    /**
     * Get the value of Alwaysturn.
     */
    public function getAlwaysturn(): bool
    {
        return $this->alwaysturn;
    }

    /**
     * Set the value of Drunkeness.
     *
     * @param bool drunkeness
     * @param mixed $drunkeness
     *
     * @return self
     */
    public function setDrunkeness($drunkeness)
    {
        $this->drunkeness = $drunkeness;

        return $this;
    }

    /**
     * Get the value of Drunkeness.
     */
    public function getDrunkeness(): bool
    {
        return $this->drunkeness;
    }

    /**
     * Set the value of Harddrink.
     *
     * @param bool harddrink
     * @param mixed $harddrink
     *
     * @return self
     */
    public function setHarddrink($harddrink)
    {
        $this->harddrink = $harddrink;

        return $this;
    }

    /**
     * Get the value of Harddrink.
     */
    public function getHarddrink(): bool
    {
        return $this->harddrink;
    }

    /**
     * Set the value of Hpmin.
     *
     * @param int hpmin
     * @param mixed $hpmin
     *
     * @return self
     */
    public function setHpmin($hpmin)
    {
        $this->hpmin = $hpmin;

        return $this;
    }

    /**
     * Get the value of Hpmin.
     */
    public function getHpmin(): int
    {
        return $this->hpmin;
    }

    /**
     * Set the value of Hpmax.
     *
     * @param int hpmax
     * @param mixed $hpmax
     *
     * @return self
     */
    public function setHpmax($hpmax)
    {
        $this->hpmax = $hpmax;

        return $this;
    }

    /**
     * Get the value of Hpmax.
     */
    public function getHpmax(): int
    {
        return $this->hpmax;
    }

    /**
     * Set the value of Hppercent.
     *
     * @param int hppercent
     * @param mixed $hppercent
     *
     * @return self
     */
    public function setHppercent($hppercent)
    {
        $this->hppercent = $hppercent;

        return $this;
    }

    /**
     * Get the value of Hppercent.
     */
    public function getHppercent(): int
    {
        return $this->hppercent;
    }

    /**
     * Set the value of Turnmin.
     *
     * @param int turnmin
     * @param mixed $turnmin
     *
     * @return self
     */
    public function setTurnmin($turnmin)
    {
        $this->turnmin = $turnmin;

        return $this;
    }

    /**
     * Get the value of Turnmin.
     */
    public function getTurnmin(): int
    {
        return $this->turnmin;
    }

    /**
     * Set the value of Turnmax.
     *
     * @param int turnmax
     * @param mixed $turnmax
     *
     * @return self
     */
    public function setTurnmax($turnmax)
    {
        $this->turnmax = $turnmax;

        return $this;
    }

    /**
     * Get the value of Turnmax.
     */
    public function getTurnmax(): int
    {
        return $this->turnmax;
    }

    /**
     * Set the value of Buffname.
     *
     * @param string buffname
     * @param mixed $buffname
     *
     * @return self
     */
    public function setBuffname($buffname)
    {
        $this->buffname = $buffname;

        return $this;
    }

    /**
     * Get the value of Buffname.
     */
    public function getBuffname(): string
    {
        return $this->buffname;
    }

    /**
     * Set the value of Buffrounds.
     *
     * @param int buffrounds
     * @param mixed $buffrounds
     *
     * @return self
     */
    public function setBuffrounds($buffrounds)
    {
        $this->buffrounds = $buffrounds;

        return $this;
    }

    /**
     * Get the value of Buffrounds.
     */
    public function getBuffrounds(): int
    {
        return $this->buffrounds;
    }

    /**
     * Set the value of Buffroundmsg.
     *
     * @param string buffroundmsg
     * @param mixed $buffroundmsg
     *
     * @return self
     */
    public function setBuffroundmsg($buffroundmsg)
    {
        $this->buffroundmsg = $buffroundmsg;

        return $this;
    }

    /**
     * Get the value of Buffroundmsg.
     */
    public function getBuffroundmsg(): string
    {
        return $this->buffroundmsg;
    }

    /**
     * Set the value of Buffwearoff.
     *
     * @param string buffwearoff
     * @param mixed $buffwearoff
     *
     * @return self
     */
    public function setBuffwearoff($buffwearoff)
    {
        $this->buffwearoff = $buffwearoff;

        return $this;
    }

    /**
     * Get the value of Buffwearoff.
     */
    public function getBuffwearoff(): string
    {
        return $this->buffwearoff;
    }

    /**
     * Set the value of Buffatkmod.
     *
     * @param string buffatkmod
     * @param mixed $buffatkmod
     *
     * @return self
     */
    public function setBuffatkmod($buffatkmod)
    {
        $this->buffatkmod = ('' == $buffatkmod ? null : $buffatkmod);

        return $this;
    }

    /**
     * Get the value of Buffatkmod.
     *
     * @return string
     */
    public function getBuffatkmod(): ?string
    {
        return $this->buffatkmod;
    }

    /**
     * Set the value of Buffdefmod.
     *
     * @param string buffdefmod
     * @param mixed $buffdefmod
     *
     * @return self
     */
    public function setBuffdefmod($buffdefmod)
    {
        $this->buffdefmod = ('' == $buffdefmod ? null : $buffdefmod);

        return $this;
    }

    /**
     * Get the value of Buffdefmod.
     *
     * @return string
     */
    public function getBuffdefmod(): ?string
    {
        return $this->buffdefmod;
    }

    /**
     * Set the value of Buffdmgmod.
     *
     * @param string buffdmgmod
     * @param mixed $buffdmgmod
     *
     * @return self
     */
    public function setBuffdmgmod($buffdmgmod)
    {
        $this->buffdmgmod = ('' == $buffdmgmod ? null : $buffdmgmod);

        return $this;
    }

    /**
     * Get the value of Buffdmgmod.
     *
     * @return string
     */
    public function getBuffdmgmod(): ?string
    {
        return $this->buffdmgmod;
    }

    /**
     * Set the value of Buffdmgshield.
     *
     * @param string buffdmgshield
     * @param mixed $buffdmgshield
     *
     * @return self
     */
    public function setBuffdmgshield($buffdmgshield)
    {
        $this->buffdmgshield = ('' == $buffdmgshield ? null : $buffdmgshield);

        return $this;
    }

    /**
     * Get the value of Buffdmgshield.
     *
     * @return string
     */
    public function getBuffdmgshield(): ?string
    {
        return $this->buffdmgshield;
    }

    /**
     * Set the value of Buffeffectfailmsg.
     *
     * @param string buffeffectfailmsg
     * @param mixed $buffeffectfailmsg
     *
     * @return self
     */
    public function setBuffeffectfailmsg($buffeffectfailmsg)
    {
        $this->buffeffectfailmsg = $buffeffectfailmsg;

        return $this;
    }

    /**
     * Get the value of Buffeffectfailmsg.
     */
    public function getBuffeffectfailmsg(): string
    {
        return $this->buffeffectfailmsg;
    }

    /**
     * Set the value of Buffeffectnodmgmsg.
     *
     * @param string buffeffectnodmgmsg
     * @param mixed $buffeffectnodmgmsg
     *
     * @return self
     */
    public function setBuffeffectnodmgmsg($buffeffectnodmgmsg)
    {
        $this->buffeffectnodmgmsg = $buffeffectnodmgmsg;

        return $this;
    }

    /**
     * Get the value of Buffeffectnodmgmsg.
     */
    public function getBuffeffectnodmgmsg(): string
    {
        return $this->buffeffectnodmgmsg;
    }

    /**
     * Set the value of Buffeffectmsg.
     *
     * @param string buffeffectmsg
     * @param mixed $buffeffectmsg
     *
     * @return self
     */
    public function setBuffeffectmsg($buffeffectmsg)
    {
        $this->buffeffectmsg = $buffeffectmsg;

        return $this;
    }

    /**
     * Get the value of Buffeffectmsg.
     */
    public function getBuffeffectmsg(): string
    {
        return $this->buffeffectmsg;
    }
}
