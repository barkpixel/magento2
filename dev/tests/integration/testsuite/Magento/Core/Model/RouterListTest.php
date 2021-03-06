<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Core\Model;

class RouterListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\ObjectManager
     */
    protected $_objectManager;

    /**
     * @var \Magento\Core\Model\RouterList
     */
    protected $_model;

    protected function setUp()
    {
        $this->_objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->_model = $this->_objectManager->create('Magento\Core\Model\RouterList');
    }

    public function testGetRouterByRoute()
    {
        $this->assertInstanceOf(
            'Magento\Core\Controller\Varien\Router\Base',
            $this->_model->getRouterByRoute('')
        );
        $this->assertInstanceOf(
            'Magento\Core\Controller\Varien\Router\Base',
            $this->_model->getRouterByRoute('checkout')
        );
        $this->assertInstanceOf(
            'Magento\Core\Controller\Varien\Router\DefaultRouter',
            $this->_model->getRouterByRoute('test')
        );
    }

    public function testGetRouterByFrontName()
    {
        $this->assertInstanceOf(
            'Magento\Core\Controller\Varien\Router\Base',
            $this->_model->getRouterByFrontName('')
        );
        $this->assertInstanceOf(
            'Magento\Core\Controller\Varien\Router\Base',
            $this->_model->getRouterByFrontName('checkout')
        );
        $this->assertInstanceOf(
            'Magento\Core\Controller\Varien\Router\DefaultRouter',
            $this->_model->getRouterByFrontName('test')
        );
    }
}
