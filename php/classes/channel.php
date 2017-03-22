<?php

class Channel
{
    private $name;
    private $description;
    private $country;
    private $theme;
    private $site;
    private $owner;

    /**
     * Channel constructor.
     * @param $name
     * @param $description
     * @param $country
     * @param $theme
     * @param $site
     * @param $owner
     */
    private function __construct($name, $description, $country, $theme, $site, $owner)
    {
        $this->name = $name;
        $this->description = $description;
        $this->country = $country;
        $this->theme = $theme;
        $this->site = $site;
        $this->owner = $owner;
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
    public static function createInstanceFromFields($name, $description, $country, $theme, $site, $owner)
    {
        return new Channel($name, $description, $country, $theme, $site, $owner);
    }

    /**
     * Channel constructor.
     * @param  $array
     * @return Channel
     */
    public static function createInstanceFromArray(array $array)
    {
        $name = "";
        $description = "";
        $country = "";
        $theme = "";
        $site = "";
        $owner = "";
        foreach ($array as $key => $value) {
            if ($key === 'name') {
                $name = $value;
            } elseif ($key === 'description') {
                $description = $value;
            } elseif ($key === 'country') {
                $country = $value;
            } elseif ($key == 'theme') {
                $theme = $value;
            } elseif ($key == 'site') {
                $site = $value;
            } elseif ($key == 'owner') {
                $owner = $value;
            }
        }
        return new Channel($name, $description, $country, $theme, $site, $owner);
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

    public function expose()
    {
        return array(
            "name" => $this->name,
            "description" => $this->description,
            "country" => $this->country,
            "theme" => $this->theme,
            "site" => $this->site,
            "owner" => $this->owner
        );
    }


}