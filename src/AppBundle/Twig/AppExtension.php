<?php

namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('month_name', [$this, 'monthName']),
        ];
    }

    /**
     * @param string|\DateTime $id
     *
     * @return string
     */
    public function monthName($id)
    {
        if ($id instanceof \DateTime) {
            $id = (int) $id->format('n');
        }

        if ($id == 1) {
            return 'Januari';
        } elseif ($id == 2) {
            return 'Februari';
        } elseif ($id == 3) {
            return 'Mars';
        } elseif ($id == 4) {
            return 'April';
        } elseif ($id == 5) {
            return 'Maj';
        } elseif ($id == 6) {
            return 'Juni';
        } elseif ($id == 7) {
            return 'Juli';
        } elseif ($id == 8) {
            return 'Augusti';
        } elseif ($id == 9) {
            return 'September';
        } elseif ($id == 10) {
            return 'Oktober';
        } elseif ($id == 11) {
            return 'November';
        } elseif ($id == 12) {
            return 'December';
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'app_extension';
    }
}
