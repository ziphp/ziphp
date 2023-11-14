<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

/*
 * Ensures compatibility with PHPUnit < 6.x
 */

namespace PHPUnit\Framework\Constraint {
    if (!class_exists('PHPUnit\Framework\Constraint\Constraint') && class_exists('PHPUnit_Framework_Constraint')) {
        abstract class Constraint extends \PHPUnit\Framework\Constraint\Constraint
        {
        }
    }
}

namespace PHPUnit\TextUI {
    if (!class_exists('\PHPUnit\TextUI\ResultPrinter') && class_exists('PHPUnit_TextUI_ResultPrinter')) {
        class ResultPrinter extends \PHPUnit\TextUI\ResultPrinter
        {
        }
    }
}

namespace PHPUnit\Framework\Error {
    if (!class_exists('PHPUnit\Framework\Error\Notice') && class_exists('PHPUnit_Framework_Error_Notice')) {
        class Notice extends \PHPUnit\Framework\Error\Notice
        {
        }
    }
}

namespace PHPUnit\Framework {
    if (!class_exists('PHPUnit\Framework\TestCase') && class_exists('PHPUnit_Framework_TestCase')) {
        abstract class TestCase extends \PHPUnit\Framework\TestCase
        {
            /**
             * @param string $exception
             */
            public function expectException($exception)
            {
                $this->expectException($exception);
            }

            /**
             * @param string $message
             */
            public function expectExceptionMessage($message)
            {
                $parentClassMethods = get_class_methods('PHPUnit_Framework_TestCase');
                if (in_array('expectExceptionMessage', $parentClassMethods)) {
                    parent::expectExceptionMessage($message);
                    return;
                }
                $this->expectException($this->getExpectedException());
                $this->expectExceptionMessage($message);
            }

            /**
             * @param string $messageRegExp
             */
            public function expectExceptionMessageRegExp($messageRegExp)
            {
                $parentClassMethods = get_class_methods('PHPUnit_Framework_TestCase');
                if (in_array('expectExceptionMessageRegExp', $parentClassMethods)) {
                    parent::expectExceptionMessageRegExp($messageRegExp);
                    return;
                }
                $this->expectException($this->getExpectedException());
                $this->expectExceptionMessageMatches($messageRegExp);
            }
        }
    }
}
