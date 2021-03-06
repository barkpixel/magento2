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
 * @category    Tools
 * @package     unit_tests
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Magento\Test\Tools\Migration\System\Configuration;

require_once realpath(__DIR__ . '/../../../../../../../../../')
    . '/tools/Magento/Tools/Migration/System/Configuration/AbstractLogger.php';

class LoggerAbstractTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Tools\Migration\System\Configuration\AbstractLogger
     */
    protected $_model;

    protected function setUp()
    {
        $this->_model = $this->getMockForAbstractClass('Magento\Tools\Migration\System\Configuration\AbstractLogger');
    }

    protected function tearDown()
    {
        unset($this->_model);
    }

    /**
     * @covers \Magento\Tools\Migration\System\Configuration\AbstractLogger::add()
     * @covers \Magento\Tools\Migration\System\Configuration\AbstractLogger::__toString()
     */
    public function testToString()
    {
        $this->_model->add('file1', \Magento\Tools\Migration\System\Configuration\AbstractLogger::FILE_KEY_VALID);
        $this->_model->add('file2', \Magento\Tools\Migration\System\Configuration\AbstractLogger::FILE_KEY_INVALID);

        $expected = 'valid: 1' . PHP_EOL
            . 'invalid: 1' . PHP_EOL
            . 'Total: 2' . PHP_EOL
            . '------------------------------' . PHP_EOL
            . 'valid:' . PHP_EOL
            . 'file1' . PHP_EOL
            . '------------------------------' . PHP_EOL
            . 'invalid:' . PHP_EOL
            . 'file2';

        $this->assertEquals($expected, (string)$this->_model);
    }
}

