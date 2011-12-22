<?php
/**
 * Created by JetBrains PhpStorm.
 * User: manyrus
 * Date: 19.12.11
 * Time: 20:51
 * To change this template use File | Settings | File Templates.
 */
class CookieParameters
{
    /**
     * @var int
     * @see CookieBag::setTime
     */
    private $lifeTime = 0;
    /**
     * @var string
     * @see CookieBag::setName
     */
    private $name;
    /**
     * @var mix
     * @see CookieBag::setValue
     */
    private $value;
    /**
     * @var string
     * @see CookieBag::setDomain
     */
    private $domain;
    /**
     * @var string
     * @see CookieBag::setPath
     */
    private $path;
    /**
     * @var bool
     * @see CookieBag::setHttpsFlag
     */
    private $httpsFlag = FALSE;
    /**
     * @var bool
     * @see CookieBag::setHttpOnlyFlag()
     */
    private $httpOnlyFlag = FALSE;

    /**
     * Если истино - указывает, что cookie можно использовать только через http протокол.
     * Может быть использовано против xss, но не все браузеры поддерживают данную опцию.
     * @param boolean $httpOnlyFlag
     * @return \CookieParameters
     */
    public function setHttpOnlyFlag($httpOnlyFlag)
    {
        $this->httpOnlyFlag = $httpOnlyFlag;
        return $this;
    }

    /**
     * @return boolean
     * @see CookieBag::setHttpOnlyFlag()
     */
    public function getHttpOnlyFlag()
    {
        return $this->httpOnlyFlag;
    }

    /**
     * Если значение истино - указывает, что cookie должна быть передана по https соединению.
     * Может быть истино, если защищённое соединение используется.
     * @param boolean $httpsFlag
     * @return \CookieParameters
     */
    public function setHttpsFlag($httpsFlag)
    {
        $this->httpsFlag = $httpsFlag;
        return $this;
    }

    /**
     * @return boolean
     * @see CookieBag::setHttpsFlag
     */
    public function getHttpsFlag()
    {
        return $this->httpsFlag;
    }

    /**
     * Путь на сервере, в котором данная cookie будет доступна
     * @param string $path
     * @return \CookieParameters
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     * @see CookieBag::setPath
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Значение cookie
     * @param mix $value
     * @return \CookieParameters
     */
    public function setValue($value)
    {

        $this->value = $value;
        return $this;
    }

    /**
     * @return mix
     * @see CookieBag::setValue
     */
    public function getValue()
    {
        if(!isset($this->value)) throw new CookieException("Значение переменной Cookie::value не установленно.");
        return $this->value;
    }

    /**
     * Название cookie
     * @param string $name
     * @return \CookieParameters
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     * @see CookieBag::setName
     */
    public function getName()
    {
        if(!isset($this->name)) throw new CookieException("Значение переменной Cookie::value не установленно.");
        return $this->name;
    }

    /**
     * Время жизни cookie
     * @param int $time
     * @return \CookieParameters
     */
    public function setLifeTime($time)
    {
        $this->lifeTime = time() + $time;
        return $this;
    }

    /**
     * @return int
     * @see CookieBag::setTime
     */
    public function getLifeTime()
    {
        return $this->lifeTime;
    }

    /**
     * Домен, для которого cookie будет доступно.
     * @param string $domain
     * @return \CookieParameters
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
        return $this;
    }

    /**
     * @return string
     * @see CookieBag::setDomain
     */
    public function getDomain()
    {
        return $this->domain;
    }


}
