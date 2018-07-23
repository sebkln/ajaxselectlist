<?php
namespace Sebkln\Ajaxselectlist\Domain\Model;

/*
 * This file is part of the package sebkln/ajaxselectlist
 *
 * Copyright (c) 2016 Sebastian Klein <sebastian@sklein-medien.de>
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

/**
 * OptionRecord
 */
class OptionRecord extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * FAL media items. The old name is kept for backward compatibility reasons.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @lazy
     */
    protected $image = null;
    
    /**
     * text
     *
     * @var string
     */
    protected $text = '';

    /**
     * imageZoom
     *
     * @var bool
     */
    public $imageZoom;

    /**
     * OptionRecord constructor
     */
    public function __construct()
    {
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->image = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the images
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $image
     * @return void
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Returns the text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }
    
    /**
     * Sets the text
     *
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Returns the imageZoom
     *
     * @return boolean $imageZoom
     */
    public function getImageZoom()
    {
        return $this->imageZoom;
    }

    /**
     * Sets the imageZoom
     *
     * @param boolean $imageZoom
     * @return void
     */
    public function setImageZoom($imageZoom)
    {
        $this->imageZoom = $imageZoom;
    }
}