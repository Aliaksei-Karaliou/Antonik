<?php

class Channel
{
    private $name;
    private $theme;
    private $country;
    private $site;
    private $owner;
    private $startYear;
    private $address;
    private $cable;
    private $youtube;
    private $vk;

    /**
     * Channel constructor.
     * @param $name
     * @param $theme
     * @param $country
     * @param $site
     * @param $owner
     * @param $startYear
     * @param $address
     * @param $cable
     * @param $youtube
     * @param $vk
     */
    private function __construct($name, $theme, $country, $site, $owner, $startYear, $address, $cable, $youtube, $vk)
    {
        $this->name = $name;
        $this->theme = $theme;
        $this->country = $country;
        $this->site = $site;
        $this->owner = $owner;
        $this->startYear = $startYear;
        $this->address = $address;
        $this->cable = $cable;
        $this->youtube = $youtube;
        $this->vk = $vk;
    }

    public static function createInstanceFromFields($name, $theme, $country, $site, $owner, $startYear, $address, $cable, $youtube, $vk)
    {
        return new Channel($name, $theme, $country, $site, $owner, $startYear, $address, $cable, $youtube, $vk);
    }

    public static function createInstanceFromArray($array)
    {
        $name = "";
        $address = "";
        $country = "";
        $theme = "";
        $site = "";
        $owner = "";
        $startYear = "";
        $cable = "";
        $youtube = "";
        $vk = "";
        foreach ($array as $key => $value) {
            if ($key === 'name') {
                $name = $value;
            } elseif ($key === 'country') {
                $country = $value;
            } elseif ($key === 'theme') {
                $theme = $value;
            } elseif ($key === 'site') {
                $site = $value;
            } elseif ($key === 'owner') {
                $owner = $value;
            } elseif ($key === 'startYear') {
                $startYear = $value;
            } elseif ($key === 'cable') {
                $cable = $value;
            } elseif ($key === 'address') {
                $address = $value;
            } elseif ($key === 'youtube') {
                $youtube = $value;
            } elseif ($key === 'vk') {
                $vk = $value;
            }
        }
        return new Channel($name, $theme, $country, $site, $owner, $startYear, $address, $cable, $youtube, $vk);
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
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
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

    /**
     * @return mixed
     */
    public function getStartYear()
    {
        return $this->startYear;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function isCable()
    {
        return $this->cable;
    }

    /**
     * @return mixed
     */
    public function getYoutube()
    {
        return $this->youtube;
    }

    /**
     * @return mixed
     */
    public function getVk()
    {
        return $this->vk;
    }

    /**
     * @return array
     */

    public function expose()
    {
        return array(
            "name" => $this->name,
            "theme" => $this->theme,
            "country" => $this->country,
            "site" => $this->site,
            "owner" => $this->owner,
            "startYear" => $this->startYear,
            "address" => $this->address,
            "cable" => $this->cable,
            "youtube" => $this->youtube,
            "vk" => $this->vk,
        );
    }
}