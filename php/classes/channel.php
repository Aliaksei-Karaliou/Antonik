<?php

class Channel
{
    private $name;
    private $description;
    private $frequency;
    private $theme;
    private $site;
    private $owner;

    /**
     * Channel constructor.
     * @param $name
     * @param $description
     * @param $frequency
     * @param $theme
     * @param $site
     * @param $owner
     */
    public function __construct($name, $description, $frequency, $theme, $site, $owner)
    {
        $this->name = $name;
        $this->description = $description;
        $this->frequency = $frequency;
        $this->theme = $theme;
        $this->site = $site;
        $this->owner = $owner;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * @return mixed
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    public function expose()
    {
        return array(
            "name" => $this->name,
            "description" => $this->description,
            "frequency" => $this->frequency,
            "theme" => $this->theme,
            "site" => $this->site,
            "owner" => $this->owner
        );
    }


}