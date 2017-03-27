<?php
class Channel
{
    private $name;
    private $description;
    private $country;
    private $theme;
    private $site;
    private $owner;
    private $startYear;
    private $cable;

    /**
     * Channel constructor.
     * @param $name
     * @param $description
     * @param $country
     * @param $theme
     * @param $site
     * @param $owner
     * @param $startYear
     * @param $cable
     */
    public function __construct($name, $description, $country, $theme, $site, $owner, $startYear, $cable)
    {
        $this->name = $name;
        $this->description = $description;
        $this->country = $country;
        $this->theme = $theme;
        $this->site = $site;
        $this->owner = $owner;
        $this->startYear = $startYear;
        $this->cable = $cable;
    }


    /**
     * Channel constructor.
     * @param $name
     * @param $description
     * @param $country
     * @param $theme
     * @param $site
     * @param $owner
     * @return Channel
     */
    public static function createInstanceFromFields($name, $description, $country, $theme, $site, $owner, $startYear, $cable)
    {
        return new Channel($name, $description, $country, $theme, $site, $owner, $startYear, $cable);
    }

    /**
     * Channel constructor.
     * @param  $array
     * @return Channel
     */
    public static function createInstanceFromArray($array)
    {
        $name = "";
        $description = "";
        $country = "";
        $theme = "";
        $site = "";
        $owner = "";
        $startYear = "";
        $cable = "";
        foreach ($array as $key => $value) {
            if ($key === 'name') {
                $name = $value;
            } elseif ($key === 'description') {
                $description = $value;
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
            }
        }
        return new Channel($name, $description, $country, $theme, $site, $owner, $startYear, $cable);
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
    public function getCountry()
    {
        return $this->country;
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
    public function isCable()
    {
        return $this->cable;
    }

    public function expose()
    {
        return array(
            "name" => $this->name,
            "description" => $this->description,
            "country" => $this->country,
            "theme" => $this->theme,
            "site" => $this->site,
            "owner" => $this->owner,
            "startYear" => $this->startYear,
            "cable" => $this->cable
        );
    }


}